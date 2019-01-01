<?php

namespace app\admin\common\model;

use think\Model;

class Web extends Model{

	protected $pk = 'id';
	protected $table = 'web';
	protected $autoWriteTimestamp = true;
	protected $createTime = 'create_time';
	protected $updateTime = 'update_time'; 
}