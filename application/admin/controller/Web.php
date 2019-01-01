<?php

namespace app\admin\controller;

use app\admin\common\controller\Base;
use app\admin\common\model\Web as WebModel;
use app\admin\facade\Web as WebValidate;
use think\facade\Request;

class Web extends Base{

    //网站设置页面
	public function index(){
		//判断用户权限
		$this->isAdmin();
		//初始化赋值
		$web = WebModel::find(1);
		//模版赋值
		$this->view->assign('web',$web);
		//渲染模版
		return $this->view->fetch();
	}

	//网站设置修改
	public function update(){
		//接收数据
		$data = Request::post();
		//数据验证
		$res  = WebValidate::check($data);
		if(!$res){
			$this->error(WebValidate::getError());
		}
		if(WebModel::update($data)){
			$this->success('修改成功',url('admin/Web/index'));
		}else{
			$this->error('修改失败');
		}
	}
}