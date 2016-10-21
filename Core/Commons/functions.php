<?php


function p($var){
	if(is_null($var)){
		var_dump(null);
	}else if(is_array($var) || is_object($var)){
		echo "<pre>".print_r($var,true)."</pre>";
	}else{
		var_dump($var);
	}
}

function randomString($length = 6, $type=''){
	
	if(strtolower($type) == 'captcha'){ //如果是取验证码，则需要去掉0,o,O,I,1,l以免混淆
		$characters  = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ";
	}else{
		$characters  = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	}
	
	$string = '';
	for($i=0; $i<$length; $i++){
		$string .= $characters[rand(0, strlen($characters)-1)];
	}
	return $string;
}


function getExt($filename){
	$arr = explode(".", $filename);
	if(count($arr) < 2){
		return '';
	}
	return array_pop($arr);
	
}

//similar_text 计算两个字符串的相似度，放到这里是怕忘记

function is_valid_email($email){
	$pattern = "/^([0-9a-zA-Z\-\_\.]+)@([0-9a-z]+)\.([0-9a-z]{2,})(\.[0-9a-z]{2,})?$/i";
	if(preg_match($pattern, $email)){
		return true;
	}
	return false;
	
}

function is_valid_mobile($mobile){
	$pattern = "/^1[358]{1}[0-9]{9}$/";
	if(preg_match($pattern, $mobile)){
		return true;
	}
	return false;
}




