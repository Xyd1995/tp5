<?php
namespace app\admin\controller;


use think\Controller;
use app\admin\model\News;
use think\File;
use think\Request;
use think\Validate;

class NewsController extends Controller
{
	public function index()
	{
		$this->assign('title','新闻列表');
		$list = news::all();
		$this -> assign('list',$list);
		$this -> assign('count',count($list));
		return $this->fetch();
	}
	public function create()
	{
		$this->assign('title','新闻列表');
		return view('news/newsadd');
	}
	
	//添加新闻
	public function newsAdd(Request $request)
	{
		$news = new News;
		
		$news ->commonName = $_POST['newsTitle'];
		$news ->news_title = $_POST['newsLanMu'];
		$news ->zuoZhe = $_POST['newsAuthor'];
		$news ->xinWenShiJian = $_POST['newsTimer'];
		$news ->zhaiYao = $_POST['newsIntroduction'];
		$news ->neiRong = $_POST['newsMain'];
		$news ->news_checked = $_POST['newsChecked'];
		
		
		//处理缩略图
		$file = $request->file('file');
		if (empty($file)) {
			return $this->error('请上传缩略图');
		}
		// 移动到框架应用根目录/public/uploads/ 目录下
		$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
		if ($info) {
			$imgUrl = $info->getRealPath();
			$nowImgurl = strchr($imgUrl,'uploads');			
			$news ->suoLueTu = $nowImgurl;
		} else {
			// 上传失败获取错误信息
			$this->error($file->getError());
		}
		if($news ->save()){
			$success = array(
				'code' => 1,
				'data'  => '',
				'msg'   => '上传成功',
				'url'   => ''
			);
			json_encode($success);
			return json($success);
		} else {
			return $news ->getError();
		}
	}
	public function newsDelete(){
		return "删除";
	}
	public function up(Request $request)
	{
		// 获取表单上传文件
		$file = $request->file('file');
		$result = $this->validate(['file' => $file], ['file'=>'require|image'],['file.require' => '请选择上传文件', 'file.image' => '非法图像文件']);
		if(true !== $result){
			$this->error($result);
		}
		// 移动到框架应用根目录/public/uploads/ 目录下
		$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
		if ($info) {
			$imgUrl = $info->getRealPath();
			$nowImgurl = strchr($imgUrl,'uploads');
			return "成功";
		} else {
			// 上传失败获取错误信息
			$this->error($file->getError());
		}
	}
}
