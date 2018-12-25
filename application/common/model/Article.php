<?php

namespace app\common\model;

use think\Model;

class Article extends Model{
	protected $pk = 'id';
	protected $table = 'article';
	protected $autoWriteTimestamp = true;//开启自动时间戳
	protected $createTime = 'create_time';
	protected $updateTime = 'update_time';
	protected $dateFormat = 'Y年m月d日';
	protected $auto = [];
	protected $insert = ['create_time','status'=>1,'is_hot'=>0,'is_top'=>0];
	protected $update = ['update_time'];
   
    //获取器
	public function getStatusAttr($value){
		$status = [ '1' => '开启' , '0' => '禁用' ];
		return $status[$value];
	}
}