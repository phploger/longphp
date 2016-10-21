<?php

namespace core\libs;

use \core\libs\Config;

class Route{
	
	public $controller;
	public $action;
	public function __construct(){
		$path = trim($_SERVER['REQUEST_URI'],"/");
		
		
		
		if($path){
			
			$pathArr = explode("/",$path);
			
			if(isset($pathArr[0])){
				$this->controller = $pathArr[0];
				array_shift($pathArr);
			}
			
			if(isset($pathArr[0])){
				$this->action = $pathArr[0];
				array_shift($pathArr);
			}else{
				$this->action = Config::getOne("action","route");
			}
			
			for($i=0; $i<count($pathArr); $i+=2){
				if(isset($pathArr[$i+1])){
					$_GET[$pathArr[$i]] = $pathArr[$i+1];
				}
				
			}
		
		}else{
			
			$this->controller = Config::getOne("controller","route");
			$this->action = Config::getOne("action","route");
			
		}
		
		
		
	
		
		
		
	}
	
}