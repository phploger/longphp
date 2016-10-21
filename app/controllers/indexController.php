<?php

namespace app\controllers;
use \core\libs\Controller;
use \app\models\User;

class IndexController extends Controller{

	
	public function actionIndex(){
		
		$user = new User();
		$userList = $user->getUserList();
		$this->assign('userList', $userList);
		$this->display("index");
	}
}