<?php

	$db_host= "localhost";
	$db_username="root";
	$db_pass="root";
	$db_name="reservation";

	try{

		$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);
		echo 'success';
	}

	catch(PDOException $e){
		echo $e->getMessage();
	}