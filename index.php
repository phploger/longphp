<?php

//入口文件
//1定义常量
//2加载常用函数
//3启动框架

define("ROOT_PATH", str_replace("\\","/",__DIR__));
define("CORE", ROOT_PATH."/core");
define("APP", ROOT_PATH."/app");
define("NAMESPACE_APP", "app");
define("DEBUG", true);

include_once "vendor/autoload.php";

if(DEBUG){
	$whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
	ini_set("display_error","on");
}else{
	ini_set("display_error","off");
}

include_once CORE."/commons/functions.php";
include_once CORE."/start.php";

spl_autoload_register("\core\start::load");

\core\start::run();
