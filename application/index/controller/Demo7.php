<?php

namespace app\index\controller;

use think\Controller;

//use app\validate\User;

//use app\facade\User;

class Demo7 extends Controller{

	public function test1(){
		$data = [
			'name' => 'admin',
			'email'=> '852688838@qq.com',
			'password' => '123456',
			'mobile'   => '18633899381'
		];
		
		// $validate = new User();

		// if(!$validate->check($data)){
		// 	return $validate->getError();
		// }

		if(!User::check($data)){
			return User::getError();
		}

		return '通过验证';
	}

	public function test2(){


		$data = [
			'name' => 'admin',
			'email'=> '852688838@qq.com',
			'password' => '123456',
			'mobile'   => '18633899381'
		];

		$res = $this->validate($data,'app\validate\User');

		if($res){
			return $res;
		}

		return 'success';
	}
}