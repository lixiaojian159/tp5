<?php

namespace app\admin\common\controller;

use think\Controller;

use think\facade\Session;

class Base extends Controller{

	// 初始化
    protected function initialize()
    {
    	$this->isLogin();
    }

    //判断用户是否登陆,只有登陆用户才可以继续访问
    protected function isLogin(){
    	if(!Session::has('admin_id') || !Session::has('admin_name')){
    		$this->error('请登录后,再操作admin模块','User/login');
    	}
    }
}