<?php
session_start();
if (!$_SESSION['id']){
	header('Location: /ADS/index.php');
}
//header('Content-Type: text/plain');
require_once '../db_con/template.php';
require_once '../model/utils.php';

$template = Template::load('order/return.html');
$user = Util::getUser($_SESSION['id']);
$order_item = trim($_GET['order_item']);

$navigation = array(
	'order' => true,
	'return_pill' => true,
	'title' => 'Return/Exchange - ADS'
);

$data = array(
	
	'user' => $user,
	'item' => Util::getOrderItem($order_item)
);

$all_data = array_merge($navigation,$data);
echo $template->render($all_data);
?>
