<?php

namespace core\libs;

class Config{
	
	public static $conf;
	public static function getOne($name,$file){
		
		if(isset(self::$conf[$file][$name])){
			return self::$conf[$file][$name];
		}else{
			$file = CORE."/configs/".$file.".php";
			if(is_file($file)){
				$conf = include $file;
				self::$conf[$file] = $conf;
				if(isset($conf[$name])){
					return $conf[$name];
				}else{
					throw new \Exception("配置项不存在".$name);
				}

			}else{
				throw new \Exception("配置文件不存在".$file);
			}
		}
	}
	
	public static function getAll($file){
		if(isset(self::$conf[$file])){
			return self::$conf[$file];
		}else{
			$file = CORE."/configs/".$file.".php";
			if(is_file($file)){
				$conf = include $file;
				self::$conf[$file] = $conf;
				return $conf;
			}else{
				throw new \Exception("配置文件不存在".$file);
			}
		}
	}
}