<?php

namespace app\admin\controller;

use app\admin\common\controller\Base;

class Index extends Base{

    //后台首页
	public function index(){
		return $this->view->fetch();
	}
}