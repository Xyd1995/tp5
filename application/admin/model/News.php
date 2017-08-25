<?php
namespace app\admin\model;

use think\Model;

class News extends Model
{
	protected $table = 'guan_news';
	// 读取器
	protected function getUserBirthdayAttr($birthday, $data)
	{
		return date('Y-m-d', $data['birthday']);
	}
	// birthday修改器
	protected function setBirthdayAttr($value)
	{
		return strtotime($value);
	}

}
