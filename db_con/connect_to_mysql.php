<?php  
$db_host = "localhost"; 
$db_username = "root";  
$db_pass = "villacorta";  
$db_name = "ADS"; 
// connection here  
mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
mysql_select_db("$db_name") or die ("no database");              
?>