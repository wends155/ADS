<?php
require_once "../db_con/template.php";
require_once "../model/utils.php";

$template = Template::load('cat.html');
$data = array('nav' => Util::getCat());
echo $template->render($data);
?>
