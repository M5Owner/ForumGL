<?php
	$path = "includes/database/connection.php";
	require_once("includes/site_apis/class.minions.php");
	
	//unauthorized;
	
	$err_index = isset($_GET['msg']) ? $_GET['msg'] : ""; 
	session_start();
	
	/*Check if already logged in*/
	if( isset($_SESSION['username']) && isset($_SESSION['access_string']) ){
		if( $currentUser->isGoodLoginSess($_SESSION['username'],$_SESSION['access_string']) == 1 ){
			header('location: .');
		}else{
			header('location: logout.php');
		}
	}else if(( isset($_COOKIE['username']) ) && ( isset($_COOKIE['access_string']) )){
		if( $currentUser->isGoodLoginSess($_COOKIE['username'],$_COOKIE['access_string']) == 1 ){
			header('location: .');
		}else{
			header('location: logout.php');
		}
	}
	/*end of check if logged in*/
	
	if ( isset($_POST['username']) && isset($_POST['password']) ){
		if( $currentUser->isGoodLogin($_POST['username'],$_POST['password']) == 1 ){
			$rem = ( isset($_POST['keepme']) && ($_POST['keepme'] == 'yes')) ? TRUE : FALSE;
			$currentUser->sessionInitialize($_POST['username'],$_POST['password'],$rem);
			header('location: .');
		}else{
			$err_index = 'wrongLogin';
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forum GL - Login Page</title>
	<link rel="stylesheet" type="text/css" href="styles/intro.css">

	 <script type="text/javascript">
    function validate() {
        if (document.getElementById('squaredThree').checked) {
            document.getElementById("squaredThreeBox").style.color = "#f8f8f8";
        } else {
            document.getElementById("squaredThreeBox").style.color = "#a9a9a9";
        }
    }
    </script>
</head>
<body>
	<img class="logo-intro" src="images/logo.png">
	<div id="error-login"><?php echo isset($err_index) ? $err_index : ""; ?></div>
	<form method="POST" action="login.php">
	    <div>
	        <input name="username" type="text" id="name" placeholder="USERNAME/EMAIL" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ""; ?>">
	    </div>
	    <div>
	        <input name="password" type="password" id="password" placeholder="PASSWORD">
	    </div>
	    
		<!-- Squared THREE -->
		<div class="squaredThree">
			<input type="checkbox" value="yes" name="keepme" id="squaredThree" onclick="validate()" name="check" />
			<label for="squaredThree" id="squaredThreeBox" >KEEP ME LOGGED IN</label>
		</div>

		   <div class="button-valid">
		        <button type="submit" class="button-signin" value="envoyer" style="cursor: pointer;">SIGN IN</button>
		        <input href="newMinion.php" class="button-register" value="REGISTER" onclick="location.href='signup.php';" style="cursor: pointer;">
		   </div>
	</form>
</body>
</html>