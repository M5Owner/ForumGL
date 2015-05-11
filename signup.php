<?php
	
	
	$err_msg = "";
	$full_name = isset($_POST['fn']) ? $_POST['fn'] : "";
	$user_name = isset($_POST['un']) ? $_POST['un'] : "";
	$email = isset($_POST['em']) ? $_POST['em'] : "";
	$passwd1 = isset($_POST['pass1']) ? $_POST['pass1'] : "";
	$passwd2 = isset($_POST['pass2']) ? $_POST['pass2'] : "";
	
	if( !empty($full_name) && !empty($user_name) && !empty($email) && !empty($passwd1) && !empty($passwd2) ){
		if( $passwd1 == $passwd2 ){
			$path = "includes/database/connection.php";
			include_once("includes/site_apis/class.minions.php");
			
			if($currentUser->checkIfexist($user_name) == 0){
				if($currentUser->checkIfexistEmail($email) == 0){
					$err_msg = ($currentUser->addNewUser($full_name,$user_name,$email,$passwd1) == 1) ? ":)" : ":(";
				}else{$err_msg = "usedEmail";}
			}else{$err_msg = "usedUsername";}
		}else{$err_msg = "doesntMatch";}
	}else{$err_msg = "unfilled";}
	
	/*error array*/
	
	$err_array = array("usedEmail" => "Cette adresse mail est déjà utilisé, Essayer avec une autre, Si vous avez déjà un compte <a href='login.php'>cliquez ici</a> pour se connecter",
					   "usedUsername" => "Ce Pseudo est déjà utilisé, essayer avec un autre, Si vous avez déjà un compte <a href='login.php'>cliquez ici</a> pour se connecter",
					   ":)" =>"Votre compte à été créer, <a href='login.php'> Cliquez ici </a> pour vous identifier",
					   ":(" => "une erreur s'est produite, essayez men hna chwya",
					   "doesntMatch" => "vérifier que les mot de passe sont les mêmes",
					   "unfilled" => "3emmer kolshi");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forum GL - Sign-up Page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles/intro.css">
</head>
<body>
	<i class="my-icon"><i></i><i></i></i>
	
	<img class="addpic" src="images/addpic.png">

	<div id="error-from"> <?php echo isset($err_array[$err_msg]) ? $err_array[$err_msg] : ""; ?> </div>
	<form method="POST" action="signup.php">

	    <div>
	        <input type="text" id="fullname" placeholder="FULL NAME" name="fn" value="<?php echo isset($_POST['fn']) ? $_POST['fn'] : ""; ?>">
	    </div>
	    <div class="username">
	        <input type="text" id="username" placeholder="USERNAME" name="un" value="<?php echo isset($_POST['un']) ? $_POST['un'] : ""; ?>">
	    </div>
	    <div>
	        <input type="email" id="mail" placeholder="EMAIL ADRESS" name="em" value="<?php echo isset($_POST['em']) ? $_POST['em'] : ""; ?>">
	    </div>
	    <div>
	        <input type="password" id="pwd" placeholder="PASSWORD" name="pass1">
	    </div>
	    <div>
	        <input type="password" id="repeatpwd" placeholder="REPEAT PASSWORD" name="pass2">
	    </div>
		   <div class="button-valid">
		        <button class="button-signin" type="reset">CLEAR</button>
		        <input type="submit" class="button-register" value="SUBMIT">
		   </div>
		   
	</form>

</body>
</html>
