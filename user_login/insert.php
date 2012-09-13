<?php
	$conn = new PDO('mysql:host=localhost;dbname=salesmonitoringinventorysystem','root','villacorta');
	$uname= $_POST['username'];
	$pass = $_POST['password'];
	$sql = "insert into user(username,password) values ('".$uname."','".$pass."')";
	$stmt = $conn->query($sql);
	header('Location: index.php');
	
	$product_id= $_POST['username'];
	$pass = $_POST['password'];
	$sql = "insert into user(username,password) values ('".$uname."','".$pass."')";
	$stmt = $conn->query($sql);
	header('Location: index.php');
?>