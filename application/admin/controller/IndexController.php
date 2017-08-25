<?php
namespace app\admin\controller;

use think\Controller;

class IndexController extends Controller
{
	public function index()
	{
		$this->assign('title','后台');
		return $this->fetch();
	}
	public function xydNews()
	{
		$this->assign('title','新闻管理');
		return $this->fetch('news/news');
	}
}
