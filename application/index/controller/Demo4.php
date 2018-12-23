<?php

namespace app\index\controller;

use think\Controller;

use think\facade\View;

class Demo4 extends Controller{

	public function index(){
	    $content = '<h2>php中文网欢迎你</h2>';
	    //return $this->display($content);
	    //return $this->view->display($content);
	    return View::display($content);
    }
}
