<?php

namespace app\admin\controller;

use app\admin\common\controller\Base;

use app\admin\common\model\User;
use think\facade\Session;
use think\facade\Request;
use app\admin\facade\User as UserValidate;
use think\Db;

class Index extends Base{

    //后台首页
	public function index(){
		return $this->view->fetch();
	}

	//用户列表
	public function userlist(){
		//获取用户列表
		$admin_level = Session::get('admin_level');
		$admin_id = Session::get('admin_id');
		if($admin_level == 1){
			$userlist = User::all();
		}else{
			$userlist = User::where('id',$admin_id)->select();
		}

		$this->view->assign('userlist',$userlist);
		$this->view->assign('title','会员列表');
		return $this->view->fetch();
	}

	//用户编辑
	public function edit(){
		$id = Request::param('id');
		$user = User::find($id);
		$this->view->assign('title','会员编辑');
		$this->view->assign('user',$user);
		return $this->view->fetch();
	}

	//用户编辑逻辑
	public function doEdit(){
		//接收数据
		$data = Request::post();
		//验证数据
		$res  = UserValidate::check($data);
		if(!$res){
			//验证失败
			$this->error(UserValidate::getError());
		}else{
			//验证成功
			$user = User::find($data['id']);
			if($data['password'] != $user['password']){
				$data['password'] = sha1($data['password']);
			}

			$id = $data['id'];
			unset($data['id']);

			$userModel = new User;
			$userRes = $userModel->save($data,['id'=>$id]);
			if($userRes){
				$this->success('修改成功',url('admin/Index/userlist'));
			}else{
				$this->error('修改失败');
			}
		}
	}

	//用户删除逻辑
	public function delete(){
		$id  = Request::param('id');
		$res = Db::table('user')->delete($id);
		if($res){
			$this->success('删除成功',url('admin/Index/userlist'));
		}else{
			$this->error('删除失败');
		}
	}
}