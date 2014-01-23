<?php
session_start();
?>

<?php
if (isset($_POST['username'],$_POST['password'],$_POST['submit']))
{
$username = $_POST['username'];
$password = $_POST['password'];
$error=array();
	if($username&&$password)
	{
		$connect = mysql_connect("localhost","root","root") or die("couldn't connect to the database");
		mysql_select_db("reservation") or die("couldn't find db");
		$query = mysql_query("select * from register where username='$username'");
		$numrows = mysql_num_rows($query);
	
		if ($numrows!=0)
		{
			while ($row = mysql_fetch_assoc($query))
			{
			 $dbusername=$row['username'];
			 $dbpassword=$row['password'];
			}
			if($username==$dbusername&&$password==$dbpassword)
			{
			 $_SESSION['currentuser'] = $username;
			 $_SESSION['password'] = $password;
			 $url="Location: jaduu.php?problem=$problem";
			header($url);
			exit();
			}
		}


		$problem="";
		if($username==$dbusername && $password !==$dbpassword)
		{
			$problem="InvalidPassword";
		}
		if($username!=$dbusername)
		{
			$problem="Invalid user";	
		}
	}
}
	
?>