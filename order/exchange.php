<?php
require_once "../model/utils.php";
session_start();
$id = $_POST['id'];
$size = $_POST['size'];
$color = $_POST['color'];
//echo "$id,$size,$color";
Util::updateOrderItem($id,$size,$color);
header('Location: /ADS/order/orders.php');

?>
