<?php

namespace app\admin\common\model;

use think\Model;

class User extends Model{

	protected $pk = 'id';
	protected $table = 'user';
	protected $autoWriteTimestamp = true;
	protected $createTime = 'create_time';
	protected $updateTime = 'update_time';
	protected $dateFormat = 'Y年m月d日';

	public function getStatusAttr($value){
		$status = ['1' => '开启', '0' => '禁用'];
		return $status[$value];
	}
}