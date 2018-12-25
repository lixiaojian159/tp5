<?php

namespace app\common\facade;

use think\Facade;

class Article extends Facade{

	protected static function getFacadeClass()
    {
    	return 'app\common\model\Article';
    }
}