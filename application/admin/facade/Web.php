<?php

namespace app\admin\facade;

use think\Facade;

class Web extends Facade{

	protected static function getFacadeClass()
    {
    	return 'app\admin\validate\Web';
    }
}