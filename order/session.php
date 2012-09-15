<?php
header('Content-Type: text/plain');
session_start();
var_dump($_SESSION['cart']);
session_destroy();

?>
