<?php
	session_start();
	
	$_SESSION = array();

	if( isset($_COOKIE['username']) )
		setcookie('username','',strtotime(" -5 days "));
	if( isset($_COOKIE['access_string']) )
		setcookie('access_string','',strtotime(" -5 days "));
	
	session_destroy();
	
		
	if( !isset($_SESSION['username']) ){
		header('location: login.php');
	}
?>