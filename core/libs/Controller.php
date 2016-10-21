<?php
/*****************************************
 * 控制器基类
 ****************************************/
namespace core\libs;

class Controller{
	
	public $assign;
	public $controller;

    /**
     * 分配变量
     * @param $name
     * @param $value
     */
	public function assign($name,$value){
		
		$this->assign[$name] = $value;
		
	}

    /**
     * 显示模式
     * @param $view
     * @return bool
     * @throws \Exception
     */
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