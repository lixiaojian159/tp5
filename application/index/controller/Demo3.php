<?php

namespace app\index\controller;

use think\Controller;

use think\Db;

use app\index\model\Users;

class Demo3{

	public function index(){
		//$res = Users::get(27);
		//$res = Users::field('id,name,email')->find(27);
		//$res = Db::table('users')->field('id,name,email')->find(27);
		//$res = Users::field('id,name,email')->where('id','<=',10)->select();
		$res = Db::table('users')->field('id,name,email')->where('id','<=',10)->select();
		dump($res);
	}

	public function all(){
		//$res = Users::all([1,2,3]);
		$res = Users::field('id,name,email')->where('id','in','1,5,10')->select();
		dump($res);
	}
}