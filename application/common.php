<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

use think\Db;

/**
 * [getUserName 根据user_id, 获取用户名]
 * @param  [int] $id   user_id
 * @return [string]    name
 */
function getUserName($id){
	//$UserModel = new app\common\model\User();
	//$user = $UserModel->find($id);
	$user = Db::table('user')->find($id);
	return $user['name'];
}


/**
 * [getContentAtt 过滤字符串]
 * @param  [string] $string  要被过滤的字符串
 * @return [string]          处理之后的字符串
 */
function getContentAtt($string){
	return mb_substr(strip_tags($string),0,50,'utf8')." ...";
}

/**
 * [getCateName 根据栏目cate_id, 获取栏目名称]
 * @param  [int]     $cateId     cate_id
 * @return [string]  $cateName   栏目名称
 */
function getCateName($cateId){
	return Db::table('article_category')->where('id',$cateId)->value('name');
}

function getStringFormat($string){
	return htmlspecialchars_decode($string);
}