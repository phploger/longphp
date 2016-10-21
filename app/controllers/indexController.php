<?php

namespace app\controllers;
use \core\libs\Controller;
use \app\models\User;
use \core\classes\Mailer;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class IndexController extends Controller{

	
	public function actionIndex(){
		
		$mobile = "17092058094";
		
		if(is_valid_mobile($mobile)){
			echo "valid";
		}else{
			echo "unvalid";
		}
		exit;
		
		$user = new User();
		$userList = $user->getUserList();
		$this->assign('userList', $userList);
		$this->display("index");
	}
	
	public function actionSendMail(){
		
		$params = array(
			'mailto' 	=> array('xxx@qq.com','xxx@163.com'),
			'subject' 	=> 'Subject',
			'body'		=> 'body',
			'attach'	=> array(
								'filepath' => APP.'/public/images/dog.jpg',
							)
		);
		
		Mailer::sendMail($params);
		
	}
	
	public function actionLog(){
		
		 
		// create a log channel
		$log = new Logger('IndexController');
		$log->pushHandler(new StreamHandler(APP.'/logs/test.log', Logger::WARNING));
		 
		// add records to the log
		$log->addWarning('Foo');
		$log->addError('Bar');
	}
}