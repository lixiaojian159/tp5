<?php
namespace app\index\controller;

use app\common\controller\Base;
use think\Controller;
use think\facade\Request;//静态代理
use think\Db;
use app\common\model\ArticleCategory;
//use app\common\validate\Article;
//use app\common\model\Article;
use app\common\facade\Article; //静态代理

class Index extends Base
{
    public function index()
    {
        $cateId  = Request::param('cate_id');
        if(isset($cateId)){
            //获取当前栏目
            $cateName = ArticleCategory::find($cateId)['name'];
            //获取文章
            // $articles = Article::all(function($query)use($cateId){
            //     $query->where('cate_id',$cateId);
            // });
            $articles = Article::where('cate_id',$cateId)->where('status',1)->paginate(1);
        }else{
            //获取当前栏目
            $cateName = '全部文章';
            //获取文章
            $articles = Article::where('status',1)->paginate(1);
        }
        $this->view->assign('cateName',$cateName);
        $this->view->assign('articles',$articles);
        return $this->fetch();
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
            //接收数据
            $data = Request::post();
            //验证数据
            $res  = $this->validate($data,'app\common\validate\Article');
            if($res !== true){
                //验证失败
                echo '<script>
                          alert("'.$res.'");
                          window.location.href = "'.url('index/Index/insert').'";
                      </script>';
            }else{
                //验证成功
                //获取上传图片
                $file = Request::file('title_img');
                $info = $file->validate(['size'=>1000000,'ext'=>'png,jpg,gif'])->move('uploads/');
                if($info){
                    $data['title_img'] = 'uploads/'.$info->getSaveName();
                    //保存数据到数据库
                    if(Article::create($data)){
                        $this->success('发布文章成功','Index/index');
                    }else{
                        $this->error('发布文章失败');
                    }
                }else{
                    $this->error($file->getError());
                }
            }
        }
    }
}
