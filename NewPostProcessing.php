<?php
	session_start();
	$path="includes/database/connection.php";
	include "includes/site_apis/class.posts.php";
	include "includes/site_apis/class.minions.php";
	
	if (isset($_POST['title']) && isset($_POST['type']) && isset($_POST['semester']) && isset($_POST['matiere']) && isset($_POST['content']) ){
		$subject = $_POST['semester'].$_POST['matiere'];
		$id = $currentUser->getIdByUsername($_SESSION['username']);
		$stmt = $posts->addNewPost($id,$_POST['semester'],$_POST['type'],$subject,"",$_POST['title'],$_POST['content']);
		if($stmt){
			echo "Post succefully added";
			$head = ".?semester=".$_POST['semester'];
			header('location: '.$head);
		}
		else {
			echo "problem";
		}
	}
   
?>
<!DOCTYPE html>
<html>
<head>
	<title>Adding new post</title>
	<link rel="stylesheet" type="text/css" href="styles/intro.css">
</head>
<body>
	
</body>
</html>