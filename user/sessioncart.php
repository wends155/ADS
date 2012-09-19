<?php
session_start();

header('Content-Type: text/plain');
require_once '../db_con/template.php';
require_once '../model/utils.php';


//echo $template->render($data);
//print_r($_SESSION);
//$_SESSION['cart'][] = $product;
print_r($_SESSION);
$_SESSION['cart'] = array();

?>
