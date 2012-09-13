<?php
	if (isset($_GET['id']))
		{
			include('../connect_to_mysql.php');		
			$id = $_GET['id'];
			mysql_query("DELETE FROM admin WHERE id='$id'");
			header("location: view.php");
			exit();
		}
?>
			