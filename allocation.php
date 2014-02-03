<?php

header("content-type=application/json");
if(isset($_POST['slotchecker']))
{
//$username=$_SESSION['currentuser'];
$db_host= "localhost";
$db_username="root";
$db_pass="root";
$db_name="reservation";
$slotchecker=$_POST['slotchecker'];

if($slotchecker)
{
	$connect = new PDO("mysql:host=".$db_host.";dbname=".$db_name,$db_username,$db_pass) or die("couldn't connect to the database");
	if($connect)
		{
			$check_timings= $connect->prepare("select time	from appointments WHERE  date='$slotchecker'");
			if($check_timings)
			{
				if($check_timings->execute())
				{
					while($booked_timings = $check_timings->fetch(PDO::FETCH_OBJ)) 
					{
						echo '<div>'.$booked_timings->time.'</div>';

					}

				}

			}

		}


}

}

?>

