<?php
	class DB{
		private static $conn = null;
				
		private static function getDB(){
			if(self::$conn instanceof PDO){
				return self::$conn;
			}
			return self::$conn = new PDO('mysql:host=localhost;dbname=ads','root','villacorta');
		}
		
		public static function errorInfo(){
			$conn = self::getDB();
			return $conn->errorInfo();
		}
		
		public static function hasError(){
			$errorInfo = self::errorInfo();
			if ($errorInfo[1]){
				return true;
			}
			return false;
		}
		
		public static function errorString(){
			if (self::hasError()){
				$errorInfo = self::errorInfo();
				return $errorInfo[2];
			}
			return "";
		}
		
		public static function errorCode(){
			if (self::hasError()){
				$errorInfo = self::errorInfo();
				return $errorInfo[1];
			}
			return 0;
		}
		
		public static function exec($sql){
			
			if($sql){
				$conn = self::getDB();
				$result = $conn->exec($sql);
				if($result === false){
					throw new Exception(DB::errorString());
				}
				return $result; 
			}
			throw new Exception("Empty parameter");
		}
		
		public static function query($sql){
			
			if($sql){
				$conn = self::getDB();
				$result = $conn->query($sql);
				if($result === false){
					throw new Exception(DB::errorString());
				}
				return $result;
			}
			throw new Exception("Empty parameter");
		}
		
		public static function prepare($sql){
			if($sql){
				$conn = self::getDB();
				$result = $conn->prepare($sql);
				if($result === false){
					throw new Exception(DB::errorString());
				}
				return $result;
			}
			throw new Exception("Empty parameter");
		}
		
		public static function prep_param($sql,$params){
			if( is_array($params) && $sql ){
				$stmt = self::prepare($sql);
				$success = $stmt->execute($params);
				if($success === false){
					throw new Exception(DB::errorString());
				}
				return $stmt;
			}
			throw new Exception("Parameter error");
		}
		
		public static function lastInsertId(){
			$conn = self::getDB();
			return $conn->lastInsertId();
		}
	}

?>
