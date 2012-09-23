<?php

function autoload($class_name){
	$path = __DIR__ . DIRECTORY_SEPARATOR . strtolower($class_name) . '.php' ;
	
	if( is_file($path)){
		require_once $path;
	}
}
ini_set('unserialize_callback_func', 'spl_autoload_call');
spl_autoload_register('autoload');

?>
