<?php
require "utils.php";
$cat = Util::getSubCat(25);
print_r($cat);
$prods = Util::getSubCatProducts(25);
print_r($prods);

?>
