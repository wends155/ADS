<?php
session_start();
//Connect to the database through our include 
include_once "../db_con/connect_to_mysql.php";
$result = mysql_query("select password from users where id=".$id."'");

if($_POST['newpassword']!=null){
$password = $_POST['newpassword'];

if(!$result)
{
echo "oops! The Username you entered does not exist";
}
else
if($_POST['password']!= mysql_result($result, 0))
{
echo "You entered an incorrect password";
}
else if($_POST['newpassword']!=$_POST['confirmnewpasssword'])
{
echo "The new password and confirm new password fields must be the same";
}
else{
$password = md5($password);
$sql=mysql_query("UPDATE users SET password='".md5($password)."' where id='".$_SESSION['id']."'");
}
if($sql)
{
echo "Congratulations You have successfully changed your password   ";
}

}
?>
<h1>Change Password</h1>
<form action="" method="POST">
	<ul>
		<li>
			Current Password:
			<input type="text" name="current_password">
		</li>
		<br>
		<li>
			New Password:
			<input type="text" name="newpassword">
		</li>
		<br>
		<li>
			New Password Again:
			<input type="text" name="confirmnewpasssword">
		</li>
		<br>
		<li>
			<input type="submit" value="Change Password">
		</li>
	</ul>
</form>