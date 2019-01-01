<?php

namespace app\admin\validate;

use think\Validate;

class Web extends Validate{

	protected $rule = [
		'name'     => 'require|length:1,20|chsAlphaNum',
		'keywords' => 'require|length:6,200|chsDash',
		'descs'    => 'require|max:300',
		'is_open'  => 'require|number',
		'is_reg'   => 'number'
	];
}