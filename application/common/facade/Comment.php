<?php

namespace app\common\facade;

use think\Facade;

class Comment extends Facade{

	protected static function getFacadeClass()
    {
    	return 'app\common\validate\Comment';
    }
}