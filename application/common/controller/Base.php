<?php

namespace app\common\controller;

use think\Controller;

use think\facade\Session;

class Base extends Controller{

	// 初始化
    protected function initialize(){
    	
    }

    //防止用户重复登录
    protected function Logined(){
    	if(Session::has('user_id')){
    		$this->error('您已经登录,不能重复登录','index/index');
    	}
    }

    //用户登陆才可以继续操作
    public function isLogin(){
        if(!Session::has('user_id') || !Session::has('user_name')){
            $this->error('请登陆后,再进行此操作','User/login');
        }
    }
}