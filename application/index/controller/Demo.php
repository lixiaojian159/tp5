<?php

namespace app\index\controller;

use think\Db;

class Demo{

    //全局配置
	public function conn1(){
		$db = Db::table('users')->where('id',1)->find();
		dump($db);
	}

	//动态配置
	public function conn2(){
		return Db::connect(['type'=>'mysql','hostname'=>'127.0.0.1','database'=>'dashio','username'=>'root','password'=>''])
		->table('users')->where('id',10)->value('name');
	}

	//DSN
	public function conn3(){
		$dsn = 'mysql:root: @127.0.0.1:3306/dashio#utf8';
		return Db::connect($dsn)
		->table('users')
		->where('id',5)
		->value('name');
	}
}