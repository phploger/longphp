<?php

namespace core\libs;
use \core\libs\Config;

class Model extends \medoo{
	
	public function __construct(){
		
		$options = Config::getAll("db");
		
		parent::__construct($options);
	}
}