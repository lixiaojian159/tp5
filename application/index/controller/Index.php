<?php
namespace app\index\controller;

//use think\facade\Request;
use app\common\controller\Base;
use think\Controller;
use think\Request;
use think\Db;

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
}
