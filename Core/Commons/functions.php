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