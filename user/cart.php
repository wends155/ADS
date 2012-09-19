<?php
session_start();
if (!$_SESSION['id']){
	header('Location: /ADS/index.php');
}
//header('Content-Type: text/plain');
require_once '../db_con/template.php';
require_once '../model/utils.php';

$template = Template::load('user/cart.html');
$user = Util::getUser($_SESSION['id']);
if(trim($_GET['prod']) && $_POST['quantity']){
	$product = Util::getProduct($_GET['prod']);
	$product['size'] = $_POST['size'];
	$product['color'] = $_POST['color'];
	$product['quantity'] = $_POST['quantity'];
	$subtotal = $_POST['quantity'] * $product['price'];
	$product['subtotal'] = sprintf('%.2f',$subtotal);
	$_SESSION['cart'][] = $product;
	
	foreach($_SESSION['cart'] as $key => &$value){
		$value['key'] = $key;
	}
}

if($_GET['del'] >= 0){
	$id = trim($_GET['del']);
	unset($_SESSION['cart'][$id]);
}

$data = array(
	'title' => 'Cart',
	'catalog' => true,
	'user' => $user,
	'cart' => array('items' => $_SESSION['cart'], 'count' => count($_SESSION['cart'])),
	'nav' => Util::getCat()
);
$total = 0;
foreach($data['cart']['items'] as $item){
	$total += $item['subtotal'];
}
$data['cart']['total'] = sprintf('%.2f',$total);

echo $template->render($data);
//print_r($data);

//print_r($_SESSION);
?>
