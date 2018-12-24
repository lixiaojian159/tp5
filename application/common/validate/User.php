<?php

namespace app\common\validate;

use think\Validate;

class User extends Validate{

	protected $rule = [
		'name'  => 'require|length:5,20|chsAlphaNum',
		'email' => 'require|email|unique:user',
		'mobile'=> 'require|number|mobile|unique:user',
		'password'=> 'require|alphaNum|confirm:password_confirm'
	];
}