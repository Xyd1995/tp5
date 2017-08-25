<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
//API 请求方式 为参数传入的方式
Route::rule(':version/:id','api/:version/read');
Route::resource('news','api/news');
return [
	//路由规则		路由到index控制器index方法 
	'__pattern__' => [
	'id' => '\d+',
	],
	'admin/index' => 'admin/news/index',
	'admin/create' => 'admin/news/create',
	'admin/newsAdd' => 'admin/news/newsadd',
	'admin/newsDelete' => 'admin/news/newsDelete',
];
