<?php

namespace app\common\controller;

use think\Controller;

use think\facade\Session;

use app\common\model\ArticleCategory;
use app\admin\common\model\Web;
use app\common\model\Article;

class Base extends Controller{

	// 初始化
    protected function initialize(){
        //判断网站状态
        $this->isOpen();
        //获取网站导航
    	$this->showNav();
        //获取热门文章
        $this->getArtHot();
    }

    //防止用户重复登录
    protected function Logined(){
    	if(Session::has('user_id')){
    		$this->error('您已经登录,不能重复登录','index/index');
    	}
    }

    //用户登陆才可以继续操作
    public function isLogin(){
        if(!Session::has('user_id') || !Session::has('user_name')){
            $this->error('请登陆后,再进行此操作','User/login');
        }
    }

    //获取分页导航
    public function showNav(){
        $cateList = ArticleCategory::all(function($query){
            $query->where('status',1)->order('sort','asc');
        });
        $this->view->assign('cateList',$cateList);
    }

    //判断网站状态 开启 关闭
    public function isOpen(){
        $web = Web::where('id',1)->find();
        if($web['is_open'] == 0){
            $this->redirect('/index/Close/index');
            exit;
        }
    }

    //判断注册状态 开启  关闭
    public function isReg(){
        $web = Web::where('id',1)->find();
        if($web['is_reg'] == 0){
            $this->error('注册功能关闭');
        }
    }

    //获取热门文章
    public function getArtHot(){
        $hots = Article::where('status',1)->order('pv','desc')->limit(7)->select();
        $this->assign('hots',$hots);
    }
}