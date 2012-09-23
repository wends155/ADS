<?php
require_once "idiorm.php";
ORM::configure('sqlite:ads.sqlite');
abstract class Model{
	public static $_table = __CLASS__;
	protected $_orm = null;
	protected static $class = null;
	
	public static function configure(){
		ORM::configure('sqlite:ads.sqlite');
	}	
	
	public function __construct($orm = null){
		self::configure();
		if($orm){
			$this->_orm = $orm;
		} else {
			$this->_orm = ORM::for_table(static::$_table)->create();
		}
	}
	
	public function __set($name,$value){
		//$this->_orm->$name = $value;
		$setter = 'set' . ucfirst($name);
		return $this->$setter($value);
	}
	
	public function __get($name){
			$getter = 'get' . ucfirst($name);
			return $this->$getter();
		
	}
	
	public function save(){
		$this->_orm->save();
	}
	
	public function id(){
		return $this->_orm->id();
	} 
	
	public static function findById($id){
		self::configure();
		$user = ORM::for_table(static::$_table)->find_one($id);
		
		return new static::$class($user);
	}
}


?>
