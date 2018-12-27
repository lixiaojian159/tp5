<?php

namespace app\admin\controller;

use app\admin\common\controller\Base;

class Index extends Base{

    //后台首页
	public function index(){
		return $this->view->fetch();
	}

	//用户列表
	public function userlist(){
		return $this->view->fetch();
	}
}