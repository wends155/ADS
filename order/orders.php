<?php
session_start();
if (!$_SESSION['id']){
	header('Location: /ADS/index.php');
}
//header('Content-Type: text/plain');
require_once '../db_con/template.php';
require_once '../model/utils.php';

$template = Template::load('order/orders.html');
$user = Util::getUser($_SESSION['id']);
//$_SESSION['user'] = $user;
if(trim($_GET['count'])){
	Util::insertOrder($_SESSION);
	$_SESSION[cart] = array();
	unset($_SESSION['cart_total']);
	unset($_SESSION['cart_downpayment']);
}
$orders = Util::getOrders($_SESSION['id']);


$navigation = array(
	'order' => true,
	'orders_pill' => true,
	'title' => 'Orders'
);

$data = array(
	'user' => $user,
	'orders_content' => $orders
	
);

$all_data = array_merge($navigation,$data);
echo $template->render($all_data);
?>
