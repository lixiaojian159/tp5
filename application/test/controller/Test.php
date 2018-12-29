<?php

namespace app\test\controller;

use think\Controller;

class Test extends Controller{

	public function index(){
		return $this->view->fetch();
	}
	public function do(){
		$file = request()->file('image');
		dump($file);
	}
}