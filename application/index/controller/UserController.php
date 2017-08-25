<?php
namespace app\index\controller;

use app\index\model\User as UserModel;
use think\Controller;

class userController extends Controller
{
	public function index()
	{
		$list = UserModel::paginate(3);
		$this->assign('list',$list);
		$this->assign('count',count($list));
		return $this->fetch();
	}
//	protected $type = [
//		'birthday' => 'timestamp:Y/m/d',
//	];
//	protected $autoWriteTimestamp = 'datetime';
//	protected $insert = ['status' => 1];
//	// 定义时间戳字段名
//	protected $createTime = 'create_at';
//	protected $updateTime = 'update_at';
//
//	protected function getUserBirthdayAttr($birthday, $data)
//	{
//		return date('Y-m-d', $data['birthday']);
//	}
//	
//		// birthday修改器
//		protected function setBirthdayAttr($value)
//	{
//		return strtotime($value);
//	}	
//	//增加单个用户
//	public function add()
//	{
//		$user = new UserModel;
//		if($user->allowField(true)->validate(true)->save(input('post.'))){
//			return '用户['.$user->nickname.':'.$user->id.']新增成功';
//		}else{
//			return $user->getError();
//		}
//	}
//
//	public function addList()
//	{
//		$user = new UserModel;
//		$list = [
//			['nickname' => '张三','email'=>'123456@qq.com','birthday'=>strtotime('1999-05-06')],
//			['nickname' => '三国','email'=>'546789@qq.com','birthday'=>strtotime('2020-05-06')],
//		];
//		if($user->saveAll($list)){
//			return '用户批量新增成功';
//		} else {
//			return $user->getError();
//		}
//	}
//	//查看用户数据
//	public function index()
//	{		
//		$list = UserModel::all();
//			foreach ($list as $user) {
//			echo $user->nickname . '<br/>';
//			echo $user->email . '<br/>';
//			echo date('Y/m/d', $user->birthday) . '<br/>';
//			echo '----------------------------------<br/>';
//		}
//	}
//	public function read($id='')
//	{
//		echo UserModel::get($id);
////		echo $user->nickname . '<br/>';
////		echo $user->email . '<br/>';
////		echo $user->birthday . '<br/>';
////		echo $user->create_time . '<br/>';
////		echo $user->update_time . '<br/>';
//	}
//	public function update($id)
//	{
//		$user = UserModel::get($id);
//		$user->nickname = '大耳朵图图';
//		$user->email = 'Egg@gmail.com';
//		if (false !== $user->save()) {
//			return '更新用户成功';
//		} else {
//			return $user->getError();
//		}
//	}
//	//删除用户
//	public function delete($id)
//	{
//		$user = UserModel::get($id);
//		if($user){
//			$user->delete();
//			return '删除用户';
//		}else{
//			return '删除的用户不存在';
//		}
//	}
//	//创建用户数据页面
//	public function create()
//	{
//		return view();
//	}

}
