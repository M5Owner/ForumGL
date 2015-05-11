<?php

	$path = "includes/database/connection.php";
	require_once("site_apis/class.minions.php");
	require_once("includes/site_apis/class.posts.php");
	  
	 
	 /*return: void
	  *purpose: see if there're cookies, if yes, restart a new session*/

    function check_cookies(){
    	if( ( isset($_COOKIE['username']) ) && ( isset($_COOKIE['access_string']) ) ){
    		global $currentUser;
			if( $currentUser->isGoodLoginSess($_COOKIE['username'],$_COOKIE['access_string']) ){
    			$_SESSION['username'] = $_COOKIE['username'];
				$_SESSION['access_string'] = $_COOKIE['access_string'];
			}
    	}else{
    		header("location: logout.php");
    	}
    }//end func
    // in the top of every page
    function gl_session_start(){
    	session_start();
		if( !( isset($_SESSION['username']) ) && !( isset($_SESSION['access_string']) ) )
		{
			check_cookies();
		}
	}//end func

	function postType($int){
		switch ($int) {
			case '1':
				return "tdtp";
				break;
			case '2':
				return "cours";
				break;
			case '3':
				return "examens";
				break;
			default:
				return "";
				break;
		}
	}
?>