<?php
require "time.php";
require "../db_con/db.php";

$stmt = DB::query("select * from orders where id=2");
$order = $stmt->fetch(PDO::FETCH_ASSOC);

//print_r(Time::dateDaysFromNow(30));
echo Time::dateDaysFromDate("2012-09-20",30) . "\n";
echo Time::dateDaysFromNow(30) . "\n";
echo Time::unixToDate(time()) . "\n";
echo Time::dateToUnix("0000-00-00") . " - 0000-00-00\n";
echo Time::dbTimestampToFormat($order['date']);
print_r( Time::dbTimestampToArray($order['date']));
?>
