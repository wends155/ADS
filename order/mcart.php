<?php
session_start();
require_once '../db_con/template.php';
$template =  Template::load('cart.html');
$cart = $_SESSION['cart'];
echo $template->render(array('products'=>$cart));
?>
