<?php
/**
 *  入口文件
 * 1，定义常量
 * 2，加载常用函数
 * 3，启动框架
 *
 */

//定义网站根目录
define("ROOT_PATH", str_replace("\\","/",__DIR__));
//定义框架内核目录
define("CORE", ROOT_PATH."/core");
//定义网站应用目录
define("APP", ROOT_PATH."/app");
//定义网站应用命名空间
define("NAMESPACE_APP", "app");
//是否开启debug模式，开发时建议开启(true)，生产时请头闭(false)
define("DEBUG", true);

//引入composer程序包的自动加载文件
include_once "vendor/autoload.php";

if(DEBUG){
    //debug模式开启，启用whoops是debug调试功能
	$whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    //开启错误显示
	ini_set("display_error","on");
}else{
    //关闭错误显示
	ini_set("display_error","off");
}
//加载公共函数库
include_once CORE."/commons/functions.php";
//加载框架启动文件
include_once CORE."/start.php";
//调用框架类自动加载方法
spl_autoload_register("\core\start::load");
//启动框架
\core\start::run();
