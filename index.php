<?php
ob_start();
session_start();
if (isset($_POST['username'],$_POST['password'],$_POST['submit']))
{
$username = $_POST['username'];
$password = $_POST['password'];
$error=array();
$_SESSION['currentuser']=$username;
$db_host= "localhost";
$db_username="root";
$db_pass="root";
$db_name="reservation";
$dbusername="";
$dbpassword="";

  if($_POST['username']&&$_POST['password'])
  {
    $connect = new PDO("mysql:host=".$db_host.";dbname=".$db_name,$db_username,$db_pass) or die("couldn't connect to the database");
    
    if($connect)
    {
      $checkuser = $connect -> prepare("select username, password,date from register where username = '$username'");
    
      if($checkuser)
      {
        if($checkuser->execute())
        {
          if($row = $checkuser->fetch())
          {
              
              if($username==$row['username']||$password==$row['password'])
              {
                $_SESSION['currentuser']=$username;
                header('Location:jaduu.php');
              }
          }
          
        }
      }
      else
      {
        echo 'could not connect to database';
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

  else
  {
    $problem="fill all fields";  
  }

if(empty($_POST['username']))
    {

      echo "username is empty";
    }

if(empty($_POST['password']))
    {

      echo "password is empty";
    }

}
ob_flush();
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
	<script type="text/javascript" src="js/index.js"></script>


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
			
            <form  method="post" accept-charset="utf-8" class="form" role="form">   <legend>Login</legend>
                    
                    <br>
                    <input type="text" id="username" name="username" value="" class="form-control input-lg" placeholder="username"  /><br>
					         <input type="password" id="password" name="password" value="" class="form-control input-lg" placeholder="Password"  /><br>
              
                  <button class="btn btn-lg btn-primary btn-block signup-btn" id="login" type="submit" name="submit">Login
			           </button>
            </form>          
          </div>
	  </div><!--row ended-->            
	</div>
	</div>
</div>
</body>
</html>