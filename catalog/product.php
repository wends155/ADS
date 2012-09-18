<?php
session_start();
if (!$_SESSION['id']){
	header('Location: /ADS/index.php');
	
}
require_once '../db_con/template.php';
require_once '../model/utils.php';

$productID = trim($_GET['id']);
$product = Util::getProduct($productID);

$template = Template::load('product.html');
$data = array(
	'title' => 'ADS - ' . $product['name'],
	'catalog' => true,
	'user' => array('id' => $_SESSION['id'], 'name' => $_SESSION['username']),
	'breadcrumbs' => array(array('url' => '/ADS/catalog/index.php', 'name'=>'Catalog'), 
						   array('url' => "/ADS/catalog/subcategory.php?id=" . $product['sub_id'], 'name'=>$product['sub_name'])),
	'btitle' => $product['name'],
	'nav' => Util::getCat(),
	'product' => Util::getProduct($productID)
);
echo $template->render($data);

?>
