<?php
namespace app\api\controller;

use app\api\model\News;
use think\Controller;
use think\Requset;
//跨域设置
header('Access-Control-Allow-Origin:http://localhost:8080');
//根据参数 查询新闻
class NewsController extends Controller
{
	//根据参数 查询新闻
	public function index($id = 1)
	{
		$newsList = News::get($id);
		if($newsList){
			// 图片添加域名
			forEach($newsList as $list){
				$list->suoLueTu = "http://www.test.com:8181/".$list->suoLueTu;
			}			
			return json($newsList);
		}else{
			abort(404);
		}
		
	}
}
	
?>