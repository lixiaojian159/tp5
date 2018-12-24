<?php

namespace app\common\model;

use think\Model;

class ArticleCategory extends Model{

	protected $pk = 'id';
	protected $table = 'article_category';
	protected $autoWriteTimestamp = true;
	protected $dateFormat = 'Y年m月d日';
	protected $auto = [];
	protected $insert = ['create_time','status'=>1];
	protected $update = ['update_time'];
}