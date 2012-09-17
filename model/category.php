<?php
require "model.php";

class Category extends Model{
	private static $table = "category";
		
	public function getName(){
		return $this->data['name'];
	}
	
	
}

?>
