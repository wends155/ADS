<?php  
require_once 'my_setting.php';
$db_host = $GLOBALS['set_host']; 
$db_username = $GLOBALS['set_user'];  
$db_pass = $GLOBALS['set_pass'];  
$db_name = $GLOBALS['set_db']; 
// connection here  
mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
mysql_select_db("$db_name") or die ("no database");              
?>
