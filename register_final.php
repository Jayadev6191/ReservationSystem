<?php

if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$password = $_POST['password'];
	$repeatpassword = $_POST['repeatpassword'];
	$db_host= "localhost";
	$db_username="root";
	$db_pass="root";
	$db_name="reservation";

	$date = date("Y-m-d");
	//validation for input
	if(empty($_POST['firstname'])
		&& empty($_POST['lastname'])
		&& empty($_POST['username'])
		&& empty($_POST['password'])
		&& empty($_POST['repeatpassword'])
	)
	{
		echo 'All fields are empty';
		return false;
	}
	else
	{
		if($_POST['password']==$_POST['repeatpassword'])
		{
			
				if(strlen($username)>25||strlen($firstname)>25||strlen($lastname)>25)
				{
					echo "max limit for username/firstname/lastname is 25 characters";
					return;
				}

				else if(strlen($_POST['password'])>25||strlen($_POST['password'])<6)
				{ 
				   echo "password must be between 6 and 25 characters";
				   return;
			    }
			    else
			    {
			    	$connect = new PDO("mysql:host=".$db_host.";dbname=".$db_name,$db_username,$db_pass) or die("couldn't connect to the database");
				    // mysql_select_db("reservation",$connect) or die("couldn't find db");
					 
					 $checkuser=$connect->query("
					 select * from register where username='$username' and password='$password' 
				 	");

					$num_rows=$checkuser->fetchColumn();
					//$num_rows=mysql_num_rows($checkuser);
				 	if($num_rows!=0)
					 {
					 	echo 'user already exists';
					 	return;
					 }

					 $queryreg = $connect->query("
					 INSERT into register VALUES ('','$username','$firstname','$lastname','$password','$date')
					 ");

					 $rowquery=$connect->query("
					 select * from register where username='$username' and password='$password' 
				 	");
					
					$check_rows=$rowquery->fetchColumn();
					if($check_rows!=0)
					 {
					 	echo 'successfully inserted';
					 	echo '<p><a href="index.php">click here </a>to login</p>';	
					 }					 
					 
					 //exit;
			    }

		}
		
	}

	if(empty($_POST['username']))
		{

			echo "username is empty";
		}

	if(empty($_POST['firstname']))
		{

			echo "firstname is empty";
		}

	if(empty($_POST['lastname']))
		{

			echo "lastname is empty";
		}

	if(empty($_POST['password']))
		{

			echo "password is empty";
		}

	if(empty($_POST['repeatpassword']))
		{

			echo "repeatpassword is empty";
		}
		//validation for input


}

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.10.3.custom.min.css">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
</head>
<body>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/register_final.js"></script>


<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        
		<div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://startbootstrap.com">Reservation System</a>
        </div>

   
        <div class="collapse navbar-collapse navbar-ex1-collapse pull-right">
          <ul class="nav navbar-nav">
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
		
      </div>
</nav>


<div class="container" id="wrap">
	  <div class="row">
        <div class="col-md-6 col-md-offset-3">
			
            <form action="register_final.php" method="post" accept-charset="utf-8" class="form" role="form">   <legend>Sign Up</legend>
                    <div id="registration_message"></div>
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <input type="text" id="uname" name="firstname" value="" class="form-control input-lg" placeholder="First Name"  />                        							</div>
							
                        <div class="col-xs-6 col-md-6">
                            <input type="text" id="lname" name="lastname" value="" class="form-control input-lg" placeholder="Last Name"  />                        						 </div>
                    </div>
					<br>
					<input type="text" id="email" name="email" value="" class="form-control input-lg" placeholder="email"  /><br>
                    <input type="text" id="username" name="username" value="" class="form-control input-lg" placeholder="username"  /><br>
					<input type="password" id="password" name="password" value="" class="form-control input-lg" placeholder="Password"  /><br>
					<input type="password" id="repeatpassword" name="repeatpassword" value="" class="form-control input-lg" placeholder="Confirm Password"  /><br>                                      
					 
			
                    
              <span class="help-block">
				  By clicking Create my account, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.
			  </span>
              <button class="btn btn-lg btn-primary btn-block signup-btn" id="create" type="submit" name="submit">
                   Create my account
			  </button>
            </form>          
          </div>
	  </div><!--row ended-->            
	</div>
	</div>
</div>
</body>
</html>