<?php

namespace app\validate;

use think\Validate;

class User extends Validate{

	protected $rule = [
		'name'     => [
			'require' => 'require',
			'min'     =>  5,
			'max'     =>  10
		],
		'email'    => [
			'require' => 'require',
			'email'   => 'email'
		],
		'password' => [
			'require' => 'require',
			'alphaNum'=> 'alphaNum'
		],
		'mobile'   => [
			'require' => 'require',
			'number'  => 'number',
			'mobile'  => 'mobile'
		]
	];
}