<?php
session_start();
	if(!$_SESSION['currentuser'])
	{
		header("location:index.php?problem=notLoggedIn");
		exit();
	}
	if(isset($_SESSION['currentuser'])){
	$username=$_SESSION['currentuser'];
	$db_host= "localhost";
	$db_username="root";
	$db_pass="root";
	$db_name="reservation";
	$connect = new PDO("mysql:host=".$db_host.";dbname=".$db_name,$db_username,$db_pass) or die("couldn't connect to the database");
    
	    if($connect)
	    {
	    	$query=$connect -> prepare("select * appointments where username = '$username'");
			echo $username;    		
	    }
	}
?>
