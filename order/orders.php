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




$navigation = array(
	'order' => true,
	'orders_pill' => true,
	'title' => 'Orders'
);

$data = array(
	'user' => $user,
	'orders_content' => $_SESSION
);

$all_data = array_merge($navigation,$data);
echo $template->render($all_data);
?>
