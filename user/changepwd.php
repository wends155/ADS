<?php
require "../db_con/db.php";
header('Content-Type: text/plain');
session_start();
$id = $_SESSION['id'];
$sql = DB::query("select * from `users` where `id`=$id");
$user = $sql->fetch(PDO::FETCH_ASSOC);
$user_pass = $user['password'];
$current_pass = md5($_POST['current_password']);
if($user_pass == $current_pass){
	$new_pass = trim($_POST['user_password']);
	$new_pass_conf = trim($_POST['user_password_confirmation']);
	if(($new_pass == $new_pass_conf) && $new_pass && $new_pass_conf){
		$change = DB::exec("UPDATE `users` SET `password` = md5('$new_pass') WHERE `id`=$id");
		if($change){
			$msg = "Password changed successfully!";
			header("Location: password.php?msg=$msg");
		}
	} else {
		$msg = "Password confirmation does not match or fields are empty!";
		header("Location: password.php?msg=$msg");
	}
	
}else{
	$msg = "Incorrect Password!";
	header("Location: password.php?msg=$msg");
}
?>