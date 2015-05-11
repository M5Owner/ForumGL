<?php
	include_once("includes/functions.php");
	gl_session_start();
?>
<?php

    if (isset($_GET['readtopic'])){
        include_once("topic.php");
    }else if(isset($_GET['addtopic']))
    {
		include_once("addtopic.php");
	}else{
    if (isset($_GET['semester'])){
        $sem = (int)$_GET['semester'];
        if( $sem >= 1 && $sem <= 6){
            $inc_str = "content/s".$sem.".php";
            include($inc_str);
        }
        else {
            // redirect the the  404 page
        }
    
    }else{
        include("home_page.php");
    }}
?>