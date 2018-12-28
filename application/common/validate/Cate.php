<?php

namespace app\common\validate;

use think\Validate;

class Cate extends Validate{

	protected $rule = [
		'name' => 'require|chsAlpha|unique:article_category',
		'user_id' => 'require',
		'sort'    => 'require|integer',
	];
}