<?php
require_once "../db_con/db.php";

abstract class Model{
	protected $data = array();
	
	public function __construct($data){
		if(is_array($data)){
			$this->data = $data;
		}else{ 
			throw new Exception('parameter error');
		}
	}
	
	public function __get($name){
		$getter = 'get'.$name;
		if (method_exists($this,$getter)){
			return $this->$getter();
		}
		throw new Exception("Method $name does not exist.");		
	}
	
	public function __set($name, $value){
		$setter = 'set'.$name;
		if(method_exists($this,$setter)){
			return $this->$setter($value);
		}
		throw new Exception("Method $name does not exist.");
	}
	
}

?>
