<?php
require_once '../twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader);
$users = array(
array('last'=>'sal','first'=>'wewe'),array('last'=>'il', 'first'=>'wends'));
echo $twig->render('test.html', array('test' => 'Hello', 'users' => $users));
?>
