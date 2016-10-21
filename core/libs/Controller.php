<?php

namespace core\libs;

class Controller{
	
	public $assign;
	public $controller;
	
	public function assign($name,$value){
		
		$this->assign[$name] = $value;
		
	}
	
	public function display($view){
		
		$file = APP."/views/".$this->controller."/".$view.".php";
		
		if(is_file($file)){
			
			extract($this->assign);
			include_once $file;
			
		}else{
			throw new \Exception("找不到模版文件".$file);
		}
	
		return true;
		
	}
	
}