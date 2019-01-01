<?php

namespace app\common\validate;

use think\Validate;

class Comment extends Validate{

	protected $rule = [
		'article_id' => 'require|integer',
		'user_id'    => 'require|integer',
		'content'    => 'require'
	];
}