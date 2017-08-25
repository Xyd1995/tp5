<?php
namespace app\api\model;

use think\Model;

class Profile extends Model
{
	protected $name = 'news';
	protected $type = [
		'birthday' => 'timestamp:Y-m-d',
	];
}
?>