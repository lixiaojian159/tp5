<?php

namespace app\index\controller;

//use think\Controller;
use app\common\controller\Base;

use app\common\facade\User as UserFacade;

use think\facade\Request;

use think\facade\Session;

use app\common\model\User as UserModel;

class User extends Base{

    //会员注册
	public function register(){
		$this->assign('title','会员注册');
		return $this->fetch();
	}

	//会员注册逻辑
	public function insert(){
        
        //检测是否是ajax请求
		if(!Request::isAjax()){
			$this->error('请求方式不对',url("index/User/register"));
		}
        
        //获取验证数据
		$data = Request::post();

        //开始验证
		if(!UserFacade::check($data)){
			return ['status' => 0 , 'message' => UserFacade::getError() ];
		}

        //整理写入数据库的数据
		$data = Request::except('password_confirm','post');
        
        //利用模型,写入数据库
		$res  = UserModel::create($data);

		if($res){
			return ['status' => 1 , 'message' => '注册成功'];
		}else{
			return ['status' => 0 , 'message' => '注册失败'];
		}

	}

	//会员登录
	public function login(){
		$this->isLogin();
		return $this->view->fetch('user/login',['title'=>'会员登录']);
	}

	//会员登录逻辑
	public function loginCheck(){

		//检测是否是ajaxc请求
		if(!Request::isAjax()){
			$this->error('请求格式错误',url('index/User/login'));
		}

		//接收数据
		$data = Request::post();

		//验证规则
		$rule = [
			'email'   => 'require|email',
			'password'=> 'require|alphaNum'
		];
 
        //开始验证
		$res = $this->validate($data,$rule);

        //验证失败,返回json数据
		if($res !== true){
			return [ 'status' => 0 , 'message' => $res ];
		}

		//查询数据库,看是否存在此用户
		$result = UserModel::get(function($query)use($data){
			$query->where('email',$data['email'])
			      ->where('password',sha1($data['password']));
		});

		if($result === null){
			return [ 'status' => 0 , 'message' => '登录失败' ];
		}else{
			//用户登录成功后,记录session
			Session::set('user_id',$result->id);
			Session::set('user_name',$result->name);
			return [ 'status' => 1 , 'message' => '登录成功' ];
		}
	}

	//退出登录
	public function logout(){
		Session::delete('user_id');
		Session::delete('user_name');
		$this->success('退出登录','index/index');
	}
}