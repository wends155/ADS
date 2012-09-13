<?php
	$uname = $_POST['username'];
	$pass = $_POST['pass'];
	$auth = false;
	$user=null;
	try{
		$conn = new PDO('mysql:host=localhost;dbname=ads','root','villacorta');
		$sql = "select * from user where username = '" . $uname . "'";
		$stmt = $conn->query($sql);
		$res = $stmt->fetch();
		if ($res['password'] == $pass){
			$auth = true;
			$user=$res;
		} else {
			$auth = false;
			
		}
		
	} catch(PDOException $e) {
		echo $e->getMessage();
	}
	session_start();
	if ($auth) {
		if (!isset($_SESSION['user'])){		//if the admin/user username and password are correct	
			$_SESSION['user'] = $uname;		//it will redirect //to admin-home.php,
			$_SESSION['id'] = $user['id'];	//if it is incorrect it will be redirected to index.php
		}
		header('Location:admin-home.php');
	} else {
		header('Location: index.php');
	} 

?>