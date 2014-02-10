<?php
	session_start();
	if(!isset($_SESSION['currentuser']))
	{
		header("location:index.php");
		exit();
	}
	if(isset($_SESSION['currentuser'])){
	$username=$_SESSION['currentuser'];
	$welcome= '<strong id="welcome_message">welcome '.$username.'</strong>';
	

	}
?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Reservation System</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.10.3.custom.min.css">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript" src="js/ui.js"></script>
	
</head>

<body>

<div id="wrapper">
      
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
          <li><a href="#">Dashboard</a></li>
          <li><a href="#">Shortcuts</a></li>
          <li><a href="#">Overview</a></li>
          <li><a href="#">Events</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>

</div>	


<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" id="header"> 
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
            <li><a href='logout.php'>logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br>

<div id="big_wrapper">	
	<div id="container1">
	<div id="welcome_message"><?php echo $welcome; ?></div>
	
	<div id="set">
			<strong id="date_tag">Date:</strong>
			<input type="text"  class="form-control" size=12 id="date" name="finaldate" placeholder="date"/><br />
			<div id="availability" style="margin-left:20px;"></div>
			
			
			<strong id="time_tag">Time:</strong>
			<div id="time">
			<div id="tc">
				<table>
					<tr class='b'> 
						<td class='a'><button type="button" class="btn btn-success">8 am - 9 am</button></td>
						<td class='a'><button type="button" class="btn btn-success">9 am - 10 am</button></td>
						<td class='a'><button type="button" class="btn btn-success">10 am -11 am</button></td>
						<td class='a'><button type="button" class="btn btn-success">11 am -12 am</button></td>
					</tr>
					<tr>
						<td><button type="button" class="btn btn-success">12 pm - 1 pm</button></td>
						<td><button type="button" class="btn btn-success">1 pm - 2 pm</button></td>
						<td><button type="button" class="btn btn-success">2 pm - 3 pm</button></td>
						<td><button type="button" class="btn btn-success">3 pm - 4pm</button></td>
					</tr>
				</table>
			</div>
			</div>
			<br>
			<div id="info" style="margin-left:40px;"></div>
			<div id="subbtn">
				<button class="btn btn-default" id="sub" type="submit" name="submit" value="submit">submit</button>		
			</div>	

			<input type="hidden"  class="form-control" size=12 id="postdate" name="finaldate" value="<?php if(isset($_POST['finaldate'])){echo $_POST['finaldate'];} ?>"/><br />
			<input type="hidden"  class="form-control" size=12 id="posttime" name="finaltime" value="<?php if(isset($_POST['finaltime'])){echo $_POST['finaltime'];} ?>"/><br />

			<!-- <div id="appts"></div> -->
	</div>

</div>


</body>
</html>

	
