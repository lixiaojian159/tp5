<?php

namespace app\admin\controller;

use app\admin\common\controller\Base;
use app\admin\common\model\Cate as CateModel;
use app\common\facade\Cate as CateValidate;
use think\facade\Request;

class Cate extends Base{

	//栏目列表
	public function index(){
		//判断当前用户的权限
		$this->isAdmin();
		//页面赋值
		$this->view->assign('title','栏目列表');
		$cateList = CateModel::all();
		$this->view->assign('cateList',$cateList);
		//渲染页面
		return $this->view->fetch();
	}

	//栏目编辑
	public function edit(){
		//获取id
		$id = Request::param('id');
		//查询要更新的内容
		$cate = CateModel::find($id);
		//给模版赋值
		$this->view->assign('title','栏目修改');
		$this->view->assign('cate',$cate);
		//渲染模版
		return $this->view->fetch();
	}

	//栏目编辑逻辑
	public function doEdit(){
		//接收数据
		$data = Request::param();
		//验证数据
		$res = CateValidate::check($data);
		if(!$res){
			$this->error(CateValidate::getError());
		}
		$cateRes = CateModel::update($data);
		if($cateRes){
			$this->success('更新成功',url('admin/Cate/index'));
		}else{
			$this->error('跟新失败');
		}
	}

	//栏目删除逻辑
	public function delete(){
		$id  = Request::param('id');
		$res = CateModel::where('id',$id)->delete();
		if($res){
			$this->success('删除成功',url('admin/Cate/index'));
		}else{
			$this->error('删除失败');
		}
	}

	//栏目添加
	public function add(){
		$this->view->assign('title','栏目添加');
		return $this->view->fetch();
	}

	//栏目添加逻辑
	public function doAdd(){
		$data = Request::post();
		$res  = CateValidate::check($data);
		if(!$res){
			$this->error(CateValidate::getError());
		}
		$cateRes = CateModel::create($data);
		if($cateRes){
			$this->success('添加成功',url('admin/Cate/index'));
		}else{
			$this->error('添加失败');
		}
	}
}