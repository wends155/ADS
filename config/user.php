<?php
//require_once "model.php";
require_once "general.php";

class User extends Model{
	public static $_table = 'users';
	protected static $class = 'User';
	
	protected function getId(){
		return $this->_orm->id;
	}
	protected function getProfile(){
		//self::configure();
		$profile = ORM::for_table('profiles')->where('user_id',$this->id)->find_one();
		if($profile){
			return new Profile($profile);
		}
		$profile = new Profile();
		$profile->user_id = $this->id;
		return $profile;
	}
	
	public function setPassword($value){
		$pass = md5($value);
		$this->_orm->password = $pass;
		
	}
	
	public function setUsername($value){
		throw new Exception('setting username not allowed');
	}
	
	public function validate($password){
		if($this->_orm->password == md5($password)){
			return true;
		}
		return false;
	}
	
	public static function findByUsername($username){
		//self::configure();
		$user = ORM::for_table(static::$_table)->where('username', $username)->find_one();
		if($user){
			return new User($user);
		}
		return null;
		
	}
	
	public static function validateUserPass($username, $password){
		//self::configure();
		$user = ORM::for_table(static::$_table)->where('username',$username)->find_one();
		if ($user->password == md5($password)){
			return true;
		}
		return false;
	}
	
}

$user = User::findByUsername('wewe');
$profile = $user->profile;

echo $profile->id() . "\n";
echo $profile->birthday . "\n";
echo $profile->fullname . "\n";

?>
