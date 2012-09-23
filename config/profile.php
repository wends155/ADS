<?php
require_once 'general.php';

class Profile extends Model{
	public static $_table = 'profiles';
	protected static $class = 'Profile';
	
	public function setUser_id($value){
		$this->_orm->user_id = $value;
	}
	
	public function setFname($value){
		$this->_orm->fname = $value;
	}
	
	public function setLname($value){
		$this->_orm->lname = $value;
	}
	
	public function setMname($value){
		$this->_orm->mname = $value;
	}
	
	public function setBirthday($value){
		$this->_orm->birthday = Time::dateToUnix($value);
	}
	
	public function setAddress($value){
		$this->_orm->address = $value;
	}
	
	public function setGender($value){
		$this->_orm->gender = $value;
	}
	
	public function setNationality($value){
		$this->_orm->nationality = $value;
	}
	
	public function setBio($value){
		$this->_orm->bio = $value;
	}
	
	public function setStatus($value){
		$this->_orm->status = $value;
	}
	
//==== GETTERS=====
	
	public function getFname(){
		return $this->_orm->fname;
	}
	
	public function getLname(){
		return $this->_orm->lname;
	}
	
	public function getMname(){
		return $this->_orm->mname;
	}
	
	public function getBirthday(){
		return Time::unixToDate($this->_orm->birthday); 
	}
	
	public function getAddress(){
		return $this->_orm->address;
	}
	
	public function getGender(){
		return $this->_orm->gender;
	}
	
	public function getNationality(){
		return $this->_orm->nationality;
	}
	
	public function getBio(){
		return $this->_orm->bio;
	}
	
	public function getStatus(){
		return $this->_orm->status;
	}
	
	public function getFullname(){
		return "{$this->_orm->lname}, {$this->_orm->fname} {$this->_orm->mname[0]}.";
	}
	
}

?>
