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
use think\facade\Session;

class Index extends Base
{
    public function index()
    {
        $keywords = Request::param('keywords');
        if(isset($keywords)){
            $map[] = ['title','like','%'.$keywords.'%'];
            $this->view->assign('keywords',$keywords);
        }
        $map[] = ['status','=',1];
        $cateId  = Request::param('cate_id');
        if(isset($cateId)){
            //查询条件3
            $map[] = ['cate_id','=',$cateId];
            //获取当前栏目
            $cateName = ArticleCategory::find($cateId)['name'];
            //获取文章
            $articles = Article::where($map)->where('status',1)->order('create_time','desc')->paginate(1,false,['query'=>Request::param()]);
        }else{
            //获取当前栏目
            $cateName = '全部文章';
            //获取文章
            $articles = Article::where($map)->order('create_time','desc')->paginate(3,false,['query'=>Request::param()]);
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
            $data['content'] = htmlspecialchars($data['content']);
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

    //文章详情页
    public function detail(){
        //获取文章ID
        $articleId = Request::param('id');
        $article   = Article::find($articleId);
        $article->pv = $article['pv'] + 1;
        $article->save();
        //php从后台获取登陆用户id
        $userId = Session::get('user_id');
        //标识：用户打开文章,判断是否收藏与否的状态
        if(isset($userId)){
            $map[]  = ['user_id','=',$userId];
            $map[]  = ['article_id','=',$articleId];
            $fav = Db::name('user_fav')->where($map)->find();
            if($fav){
                $fav = 2;
            }else{
                $fav = 1;
            }
        }else{
            $fav = 1;
        }
        $article['content'] = htmlspecialchars_decode($article['content']);
        $this->view->assign('fav',$fav);
        $this->view->assign('title','文章详情页');
        $this->view->assign('article',$article);
        return $this->view->fetch();
    }

    //收藏接口
    public function fav(){
        //判断请求方式
        if(!Request::isAjax()){
            return ['status' => -1 , 'message' => '请求方式为ajax'];
        }
        //php从服务器获取用户id
        $userId = Session::get('user_id');
        //接收数据
        $data = Request::param();
        //判断用户是否已经登陆
        if($data['user_id'] == 0 || $userId == null || $data['user_id'] != $userId){
            return ['status' => -2 , 'message' => '请登陆后,再操作'];
        }
        $map[] = ['article_id','=',$data['article_id']];
        $map[] = ['user_id','=',$data['user_id']];
        $res = Db::table('user_fav')->where($map)->find();
        if(is_null($res)){
            //添加收藏
            Db::name('user_fav')->insert($data);
            return ['status' => 1 , 'message' => '已收藏'];
        }else{
            //取消收藏
            Db::name('user_fav')->where($map)->delete();
            return ['status' => 0 , 'message' => '收藏'];
        }
    }
}
