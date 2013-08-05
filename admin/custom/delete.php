<?php
if ((isset($_GET['id'])) && (is_numeric($_GET['id'])))
		{
			include('../connect_to_mysql.php');
			$sqlq = sprintf("DELETE FROM admin WHERE id='%d'", $_GET['id']);
			mysql_query($sqlq);
			header("location: view.php");
			exit();
		}
?>
			