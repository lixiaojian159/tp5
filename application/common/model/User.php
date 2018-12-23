<?php

namespace app\common\model;

use think\Model;

class User extends Model{
       
	protected $pk = 'id';
	protected $table = 'user';
	protected $autoWriteTimestamp = true;
	protected $createTime = 'create_time';
	protected $updateTime = 'update_time';

    //获取器
	public function getIsAdminAttr($value){
		$admin = [ '1' => '管理员' , '0' => '普通会员'];
		return $admin[$value];
	}

    //获取器
	public function getStatusAttr($value){
		$status = [ '1' => '开启' , '0' => '禁用'];
		return $status[$value];
	}

	//修改器
	public function setPasswordAttr($value){
		return sha1($value);
	}
}