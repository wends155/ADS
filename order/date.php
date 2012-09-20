<?php
//$tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
//$date = date("D, d M Y", $timestamp);
$time = time() + 86400;
$date = getdate($time);
print_r($date);
?>
