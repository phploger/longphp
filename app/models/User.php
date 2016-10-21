<?php

namespace app\models;
use \core\libs\Model;
class User extends Model{
	
	public function getUserList(){
		$list = $this->select("user","*");
		return $list;
	}
}