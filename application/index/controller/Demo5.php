<?php

namespace app\index\controller;

use think\Controller;

use think\Db;

use think\Request;

use think\View;

use app\index\model\Users;

class Demo5 extends Controller{

	public function index(){
		//$lists = Users::all();
		$lists = Users::paginate(5);
		$this->view->assign('lists',$lists);
		return $this->view->fetch();
	}
}