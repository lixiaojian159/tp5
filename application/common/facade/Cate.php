<?php

namespace app\common\facade;

use think\Facade;

class Cate extends Facade{

	protected static function getFacadeClass()
    {
    	return 'app\common\validate\Cate';
    }
}