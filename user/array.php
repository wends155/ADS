<?php
header('Content-Type: text/plain');
session_start();
$id = $_GET['del'];
unset($_SESSION['cart'][$id]);
foreach($_SESSION['cart'] as $key => &$value){
	echo "{$key} - {$value['name']} \n";
	$value['key'] = $key;
	
}
print_r($_SESSION);
?>

