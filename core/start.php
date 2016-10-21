<?php
/**
 * 框架启动类
 *
 */

namespace core;

class start{
	
	public static $classMap;

    /**
     * 启动框架
     * @throws \Exception
     */
	public static function run(){
        //从url中解析出控制器和操作
		$route = new \core\libs\Route();
        //controller转换，如:user-center转换成UserCenterController
		$controller = self::_ucwords($route->controller)."Controller";
        //action转换，如：send-email转换成actionSendEmail
		$action  = "action".self::_ucwords($route->action);
		//控制器类的文件名格式为IndexController.php
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

    /**
     * 自动加载类
     * @param $className
     * @return bool
     *
     */
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

    /**
     * 转换控制器和操作
     * @param $var
     * @return mixed
     */
	public static function _ucwords($var){
		$var = str_replace("-"," ",$var);
		$var = ucwords($var);
		$var = str_replace(" ","",$var);
		return $var;
	}
	
}