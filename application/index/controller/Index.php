<?php
namespace app\index\controller;

use app\common\controller\Base;
use think\Controller;
use think\facade\Request;//静态代理
use think\Db;
use app\common\model\ArticleCategory;

class Index extends Base
{
    public function index()
    {
        return $this->fetch();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    public function test(){
    	$test = new \app\common\Demo2();
    	return $test->hello('nihao');
    }

    public function test2(Request $request){
    	dump($request->get());
    	//return json_encode($request->get());
    }

    public function test3(){
        $db = Db::table('users')->where('id',1)->find();
        dump($db);
    }

    public function test4(){
        dump($this->request->get());
    }

    //发布文章界面
    public function insert(){
        //只有登陆之后,才可以发布文章
        $this->isLogin();
        //网页标题赋值
        $this->view->assign('title','发布文章');
        //获取栏目列表
        $cates = ArticleCategory::all();
        if(count($cates) == 0){
            $this->error('栏目列表无数据','index/index');
        }else{
            $this->view->assign('cates',$cates);
        }
        return $this->view->fetch();
    }

    //发布文章逻辑
    public function save(){

        if(!Request::isPost()){
            return $this->error('请求方式错误','index/insert');
        }else{
            $data = Request::post();
            halt($data);
        }
    }
}
