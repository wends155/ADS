<?php
require "./db_con/db.php";

$s = DB::query("SELECT * FROM users");
$res = $s->fetch(PDO::FETCH_ASSOC);

var_dump($res);

?>