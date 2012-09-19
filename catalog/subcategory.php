<?php
session_start();
if (!$_SESSION['id']){
	header('Location: /ADS/index.php');	
}
require_once '../db_con/template.php';
require_once '../model/utils.php';

$subcatID = trim($_GET['id']);
$subcat = Util::getSubCat($subcatID);
$template = Template::load('subcategory.html');
$data = array(
	'title' => $subcat['name'],
	'catalog' => true,
	'user' => array('id' => $_SESSION['id'], 'name' => $_SESSION['username']),
	'breadcrumbs' => array(array('url' => '/ADS/catalog/index.php', 'name'=>'Catalog')),
	'name' => 'wewe',
	'subcat' => $subcat,
	'nav' => Util::getCat(),
	'products' => Util::getSubCatProducts($subcatID)
);
echo $template->render($data);

?>
