<?php

namespace app\admin\validate;

use think\Validate;

class User extends Validate{

	protected $rule = [
		'name'   => 'require|length:6,20|chsAlphaNum',
		'email'  => 'require|email',
		'mobile' => 'require|mobile',
		'password'=>'require|confirm'
	];
}