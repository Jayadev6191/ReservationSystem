<?php
session_start();
ob_start();
include_once('submission.php');
if(isset($_POST['finaldate'],$_POST['finaltime'],$_SESSION['currentuser']))
	{	
		$username=$_SESSION['currentuser'];
		$finaldate=$_POST['finaldate'];
		$finaltime=$_POST['finaltime'];
		$date = date("Y-m-d");
		$db_host= "localhost";
		$db_username="root";
		$db_pass="root";
		$db_name="reservation";
		//echo $finaltime;
		//echo $finaldate;
		//echo $finaldate.'<br>';
		//echo $finaltime.'<br>';
		//echo 'hello';
		if($finaldate&&$finaltime)
		{
		
		$connect = new PDO("mysql:host=".$db_host.";dbname=".$db_name,$db_username,$db_pass) or die("couldn't connect to the database");
			if($connect)
			{
				$validate_booking=$connect->prepare("select time from appointments where username='$username' and date='$finaldate'");
				//$appt= $connect->query("insert into appointments VALUES ('','$username','$finaldate','$finaltime')");
				//echo 'inserted';
				$validate_booking->execute();
				$actual_bookings=$validate_booking->rowCount();
				//echo $actual_bookings;
				if($actual_bookings==0)
				{
					$appt= $connect->query("insert into appointments VALUES ('','$username','$finaldate','$finaltime')");
					echo 'inserted';	
				}
				else
				{
					echo 'you already have an appointment on this day, You can not make another one';
				}
				
			}
		}
		else
		{
				die("choose all the fields");
		}
	}
ob_flush();
?>
