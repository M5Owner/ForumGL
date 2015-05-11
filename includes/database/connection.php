<?php

	$hostname = "localhost";
	$db_user = "root";
	$passwd = "";
	$db_name = "gl";
	
	//setting Domain source name
	$dsn = 'mysql:host='.$hostname.';dbname='.$db_name.'';
	
	// Connetion ...
	try{
		$dbs = new PDO($dsn,$db_user,$passwd);
	}catch(exception $e){
		echo "Chi 7aja machi hya hadik ".$e->getMessage();
		//header('location: ../../error.php?err='.$e->getCode());
	}
?>