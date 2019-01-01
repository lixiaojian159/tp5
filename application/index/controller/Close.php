<?php

namespace app\index\controller;

use think\Controller;
use app\admin\common\model\Web;

class Close extends Controller{

	public function index(){
		$web = Web::find(1);
		if($web['is_open'] == 1){
			$this->redirect('/');
		}
		return $this->view->fetch();
	}
}