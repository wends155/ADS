<?php
	require_once '../twig/lib/Twig/Autoloader.php';
	class Template{
		
		public static $environment = null;
		public static $loader = null;
		
		public static function getTwig(){
			if(self::$loader && self::$environment){
				
				return self::$environment;
			
			}
			
			require_once '../twig/lib/Twig/Autoloader.php';
			Twig_Autoloader::register();
				
			self::$loader = new Twig_Loader_Filesystem('../templates');
			self::$environment = new Twig_Environment(self::$loader);
			
			return self::$environment;
		}
		
		public static function load($file){
			if ($file){
				$env = self::getTwig();
				return $env->loadTemplate($file);
			}
			throw new Exception('No template file called');
		}
		
	}


?>
