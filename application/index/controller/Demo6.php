<?php

namespace app\index\controller;

use think\Controller;

class Demo6 extends Controller{

	public function test1(){
		$data = [
			'name' => 'admin',
			'age'  =>  20,
			'tel'  =>  '18633899381',
			'email'=>  '852688838@qq.com',	
		];
	}
}