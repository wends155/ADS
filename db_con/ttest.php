<?php
require 'template.php';

$template = Template::load('base.html');
$data = array(
	'title' => 'test',
	'catalog' => true,
	'user' => array('id' => 131),
	'products' => $_SESSION['cart']
);
echo $template->render($data);

?>
