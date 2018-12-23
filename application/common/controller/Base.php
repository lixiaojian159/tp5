<?php

namespace app\common\controller;

use think\Controller;

use think\facade\Session;

class Base extends Controller{

	// 初始化
    protected function initialize(){
    	
    }

    //防止用户重复登录
    protected function isLogin(){
    	if(Session::has('user_id')){
    		$this->error('您已经登录,不能重复登录','index/index');
    	}
    }
}