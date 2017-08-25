<?php
namespace app\api\model;

use think\Model;

class News extends Model
{	
	protected $name = 'news';
	public function profile()
	{
		return $this->hasOne('Profile');
	}
}
?>