<?php

namespace app\admin\facade;

use think\Facade;

class User extends Facade{

	protected static function getFacadeClass()
    {
    	return 'app\admin\validate\User';
    }
}