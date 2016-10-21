<?php
/*******************************
* 发送邮件类，基于swiftmailer
*******************************/
namespace core\classes;

use \core\libs\Config;

class Mailer{
	
	
	/**
	*
	* 发送邮件
	* @param $params = array(
	*						'mailto'	=> array('xxx@qq.com',''xxx@qq.com'), //多人发送
	*						'subject'	=> 'subject',
	*						'body'		=> 'body',
	*						'attach'	=> array('filepath'=>'d:/a.jpg','filetype'=>''image/jpeg','setname'=>'newname'), //可选
	*						'type'		=> 'text/html',	//可选
	*						'charset'	=> 'utf-8',		//可以选
	*
	*
	*/
	public static function sendMail($params){
		
		if(empty($params['mailto'])){
			throw new \Exception("缺少参数 mailto");
		}
		
		if(empty($params['subject'])){
			throw new \Exception("缺少参数subject");
		}
		
		if(empty($params['body'])){
			throw new \Exception("缺少参数body");
		}
		
		if(!isset($params['type'])){
			$params['type'] = 'text/html';
		}
		
		if(!isset($params['charset'])){
			$params['charset'] = 'utf-8';
		}
		
		
		$options = Config::getAll("mail");
		$transport = \Swift_SmtpTransport::newInstance($options['smtp'], $options['smtp_port']);
		$transport->setUsername($options['username']);
		$transport->setPassword($options['password']);

		$mailer = \Swift_Mailer::newInstance($transport);

		$message = \Swift_Message::newInstance();
		
		$message->setFrom(array($options['username'] => $options['from']));
		
		$message->setTo($params['mailto']);
		
		$message->setSubject($params['subject']);
		
		$message->setBody($params['body'], $params['type'], $params['charset']);
		
		if(isset($params['attach'])){
			
			if(empty($params['attach']['filepath'])){
				throw new \Exception("附件缺少参数filepath");
			}
			
			if(!is_file($params['attach']['filepath'])){
				throw new \Exception("附件文件错误");
			}
			
			if(empty($params['attach']['filetype'])){
				
				$params['attach']['filetype'] = 'image/jpeg';
			}
			
			if(empty($params['attach']['setname'])){
				$params['attach']['setname'] = basename($params['attach']['filepath']);
			}
			
			$message->attach(\Swift_Attachment::fromPath($params['attach']['filepath'], $params['attach']['filetype'])->setFilename($params['attach']['setname']));
		}
		
		$result = $mailer -> send($message);
			
		return $result;
		
	}
	
}