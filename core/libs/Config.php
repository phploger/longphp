<?php
/*************************
 * 从配置文件读取配置类
 ************************/
namespace core\libs;

class Config{
	
	public static $conf;

    /**
     * 从配置文件中读取一条配置信息
     * @param $name
     * @param $file
     * @return string
     * @throws \Exception
     */
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

    /**
     * 从配置文件中读取全部配置项
     * @param $file
     * @return array
     * @throws \Exception
     */
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