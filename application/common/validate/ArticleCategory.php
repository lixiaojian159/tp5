<?php

namespace app\common\validate;

use think\Validate;

class ArticleCategory extends Validate{

	protected $rule = [
		'name' => 'require|chsAlpha',
		'user_id' => 'require',
	];
}