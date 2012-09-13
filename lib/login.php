<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
//required to be true (pwd and username)
if($username&&$password)
{
include "../db_con/connect_to_mysql.php"; //database connect
$query = mysql_query("SELECT * FROM dealer WHERE username='$username'");
$numrows = mysql_num_rows($query);
if($numrows!=0)
	{
	  //login code
	  while ($row = mysql_fetch_assoc($query))
	  {
		$dbusername = $row['username'];
		$dbpassword = $row['password'];
	  }
	  //check if they match
	  if ($username==$dbusername&&md5($password)==$dbpassword)
	  {
		echo "Your in! <a href='member.php'>Click</a> here to enter the member page.";
		$_SESSION['username']=$username;
	  }
	  else
		echo "incorrect password! ";
	}
	else
		die ("users does not exist!");
		

}
else
	die ("Please enter username and password!");
?>