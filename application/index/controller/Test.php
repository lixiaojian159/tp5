<?php

namespace app\index\controller;

use app\common\controller\Base;

use app\common\model\User as UserModel;

use app\common\facade\User;


class Test extends Base{

	public function index(){
		$UserModel = new UserModel();
		$data = $UserModel::find(3);
		dump($data);
	}

	public function test1(){
		$url = url("index/User/register");
		echo $url;
	}

	public function test2(){
		$data = [
			'name'  => 'admin',
			'email' => 'admin@qq.com',
			'mobile'=> '18522699635',
			'password' => '123456'
		];

		$res = User::check($data);

		if(!$res){
			return User::getError();
		}

		return 'success';

	}

	public function test3(){
		return $this->view->fetch();
	}

	public function test4(){
		$this->showNav();
	}

	public function test5(){
		return getUserName(21);
	}

	public function test6(){
		getCateName(4);
	}

	public function test7(){
		return $this->isOpen();
	}

	public function test8(){
		$this->getArtHot();
	}
}