<?php
require 'template.php';
require_once '../model/utils.php';

$template = Template::load('test.html');
$data = array(
	'title' => 'test',
	'catalog' => true,
	'user' => array('id' => 131),
	'products' => $_SESSION['cart'],
	'name' => 'wewe',
	'nav' => Util::getCat()
);
echo $template->render($data);

?>
