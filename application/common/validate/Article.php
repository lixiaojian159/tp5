<?php

namespace app\common\validate;

use think\Validate;

class Artilce extends Validate{

	protected $rule = [
		'title' => 'require|length:6,20|chsAlphaNum',
		'content' => 'require',
		'title_img' => 'require',
		'user_id' => 'require',
		'cate_id' => 'require'
	];
}