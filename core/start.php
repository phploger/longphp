<?php

namespace core;

class start{
	
	public static $classMap;
	
	public static function run(){
		
		$route = new \core\libs\Route();
		$controller = self::_ucwords($route->controller)."Controller";
		$action  = "action".self::_ucwords($route->action);
		
		$controllerFile = APP."/controllers/".$controller.".php";
		
		if(is_file($controllerFile)){
			$className = NAMESPACE_APP."\\controllers\\".$controller;
			$ctrl = new $className;
			
			$ctrl->controller = $route->controller;

			if(method_exists($ctrl,$action)){
				
				$ctrl->$action();
				
			}else{
				throw new \Exception("找不到方法".$className."->".$action."()");
			}
			
		}else{
			
			throw new \Exception("找不控制器".$controller);
		}
		
		
		
	}
	
	public static function load($className){
		
		if(isset(self::$classMap[$className]))
		{
			return true;
			
		}else{
			$className = str_replace("\\","/",$className);
		
			$file = ROOT_PATH."/".$className.".php";
			
			if(is_file($file)){
				include $file;
				self::$classMap[$className] = $className;
			}else{
				
				return false;
			}
			
		}
		
	}
	
	public static function _ucwords($var){
		$var = str_replace("-"," ",$var);
		$var = ucwords($var);
		$var = str_replace(" ","",$var);
		return $var;
	}
	
}