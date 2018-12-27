<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\common\model\User as UserModel;
use think\facade\Request;
use think\facade\Session;

class User extends Controller{

    //管理后台登陆页面
	public function login(){
		$this->view->assign('title','管理员登录页');
		return $this->view->fetch();
	}

	//登陆逻辑
	public function checklogin(){
		$data  = Request::post();
		$map[] = ['email','=',$data['email']];
		$map[] = ['password','=',sha1($data['password'])];
		$user  = UserModel::where($map)->find();

		if($user){
			//验证成功,记录session
			Session::set('admin_id',$user['id']);
			Session::set('admin_name',$user['name']);
			Session::set('admin_level',$user['is_admin']);
			$this->success('登陆成功','Index/index');
		}else{
			$this->error('登陆失败');
		}
	}

	//退出系统
	public function logout(){
		Session::clear();
		$this->success('退出系统','User/login');
	}
}