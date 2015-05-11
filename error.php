<?php
	$error = $_GET['err'];
	$err = array(
			'1045' => 'Error while connection to database, Do not panic, soufiane gonna will fix it right away [Code: 1045]'
	);
	$error = $err[$error];
?>
<html>
	<head>
		<title>Error message</title>
	</head>
	<body>
		<h1>SOMETHING WENT WRONG !!</h1>
		<p> <?php echo $error ?> </p>
	</body>
</html>