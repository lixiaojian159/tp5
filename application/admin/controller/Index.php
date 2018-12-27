<?php

namespace app\admin\controller;

use app\admin\common\controller\Base;

use app\admin\common\model\User;
use think\facade\Session;

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
}