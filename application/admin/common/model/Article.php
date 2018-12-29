<?php

namespace app\admin\common\model;

use think\Model;

class Article extends Model{

	protected $pk = 'id';
	protected $table = 'article';
	protected $autoWriteTimestamp = true;
	protected $createTime = 'create_time';
	protected $updateTime = 'update_time';
}