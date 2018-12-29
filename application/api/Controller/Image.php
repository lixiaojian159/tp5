<?php

namespace app\api\controller;

use think\Controller;

class Image extends Controller{

    //图片上传
	public function upload(){
		$file = request()->file('file');
		$info = $file->move('./uploads');
		if($info){
			//上传成功
			$res['code'] = 0;
			$res['msg']  = 'success';
			$res['data'] = 'uploads/'.$info->getSaveName();
		}else{
			//上传失败
			$res['code'] = 1;
			$res['msg']  = $file->getError();
		}
		return $res;
	}
}