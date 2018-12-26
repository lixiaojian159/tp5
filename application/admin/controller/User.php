<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\common\model\User as UserModel;
use think\facade\Request;
use think\facade\Session;

class User extends Controller{

	public function login(){
		$this->view->assign('title','管理员登录页');
		return $this->view->fetch();
	}
}