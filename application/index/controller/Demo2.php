<?php

namespace app\index\controller;

use think\Controller;

use think\Db;

class Demo2{

    //单条查询
	public function find(){
		$res = Db::table('users')
		       ->where('id','=',1)
		       ->find();
		dump(is_null($res) ? '没有数据' : $res);
	}

   //单条查询,只查询部分字段
	public function find2(){
		$res = Db::table('users')
		       ->field('id,name,email')
		       ->where('id','=',1)
		       ->find();
		dump(is_null($res) ? '没有得到' : $res);
	}

    //多条查询
	public function select(){
		$res = Db::table('users')
		       ->field('id,name,email')
		       ->where([['route','=',0],['id','<=',10]])
		       ->select();
		dump($res);
	}

	//添加
	public function insert(){
		$data = [
			'name' => '金毛狮王4',
			'password'=> md5('123456'),
			'salt' => 'hello',
			'email'=> 'sw@php.cn',
			'keycode' => 'keycode',
			'route'=> 0,
		];

		$res = Db::table('users')->insertGetId($data);
		dump($res);
	}

	//添加多条
	public function insertAll(){
		$data =[
			['name' => 'Peter' , 'email' => 'p@php.cn'],
			['name' => 'Jack'  , 'email' => 'j@php.cn'],
			['name' => 'Black' , 'email' => 'b@php.cn']
		];

		$res = Db::table('users')->insertAll($data);
		dump($res);
	}

	//更新操作
	public function update(){
		$res = Db::table('users')
		       ->where('id',28)
		       ->update(['name' => '西门庆']);
		var_dump($res);
	}

	//删除操作
	public function delete(){
		$res = Db::table('users')->delete(28);
		var_dump($res);
	}

	//原生查询
	public function query(){
		$sql = 'SELECT `id`,`name`,`email` FROM `users` WHERE `id` IN(4,5,6)';
		dump(Db::query($sql));
	}

	//原生修改,添加,删除
	public function execute(){
		//$res = Db::execute('UPDATE `users` SET `name` = "武松" WHERE `id` = 27'); //更新
		//$res = Db::execute('INSERT INTO `users` (`name`,`email`,`route`,`keycode`,`password`,`salt`) VALUES ("韩信","12306@qq.com","1","abcd","123456hello","hello")');
		$res = Db::query('DELETE FROM `users` WHERE `name` = "韩信"');
		dump($res);
	}
}