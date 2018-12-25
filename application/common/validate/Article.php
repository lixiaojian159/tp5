<?php

namespace app\common\validate;

use think\Validate;

class Article extends Validate{

	protected $rule = [
		'title'     => 'require|length:6,20|chsAlphaNum',
		'cate_id'   => 'require',
		'content'   => 'require',
		//'title_img' => 'require',
		'user_id'   => 'require',
	];
}