<?php

namespace app\admin\controller;

use app\admin\common\controller\Base;
use app\admin\common\model\Article as ArtModel;
use app\admin\common\model\Cate;
use think\facade\Session;
use think\facade\Request;

class Article extends Base{

    //文章列表
	public function index(){
		//获取当前登陆用户的id和角色
		$admin_id = Session::get('admin_id');
		$admin_level = Session::get('admin_level');
		if($admin_level == 1){
			$articles = ArtModel::paginate(5);;
		}else{
			$articles = ArtModel::where('user_id',$admin_id)->paginate(5);;
		}
		//模版赋值
		$this->view->assign('articles',$articles);
		$this->view->assign('title','文章列表');
		//渲染模版
		return $this->view->fetch();
	}

	//文章编辑
	public function edit(){
		//获取用户角色
		$admin_id = Session::get('admin_id');
		$admin_level = Session::get('admin_level');

		//获取文章所有分类
		$cates = Cate::all();
		//获取要修改的文章ID
		$id = Request::param('id');
		//根据id获取文章
		$article = ArtModel::find($id);
		//判断用户如果不是超级管理员,则只能修改自己的文章
		if( $admin_level == 0 ){
			if($admin_id != $article['user_id']){
				$this->error('您没有编辑此文章的权限');
			}
		}
		$article['content'] = htmlspecialchars_decode($article['content']);
		//模版赋值
		$this->view->assign('title','文章编辑');
		$this->view->assign('cates',$cates);
		$this->view->assign('article',$article);
		//渲染页面
		return $this->view->fetch();
	}

	//文章编辑逻辑
	public function doEdit(){
		$data = Request::post();
		if($data['title_img'] == '') unset($data['title_img']);
		$res = ArtModel::update($data);
		if($res){
			$this->success('更新成功',url('admin/Article/index'));
		}else{
			$this->error('更新失败');
		}
	}

	//文章删除逻辑
	public function delete(){
		//获取用户角色
		$admin_level = Session::get('admin_level');
		$admin_id = 	Session::get('admin_id');
		$id  = Request::param('id');
		$article = ArtModel::find($id);
		//权限判定
		if($admin_level == 0){
			if($admin_id != $article['user_id']){
				$this->error('您没有删除此文章的权限');
			}
		}
		$res = ArtModel::where('id',$id)->delete();
		if($res){
			$this->success('删除成功',url('admin/Article/index'));
		}else{
			$this->error('删除失败');
		}
	}
}