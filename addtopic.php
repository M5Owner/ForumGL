<html>
<head>
	<title>Forum gl</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/main.css">
	<script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
	<header>
		<div class="bar">
			<nav><a href=".">HOME</a></nav>
			<nav><a href="#">SEARCH</a></nav>
			<nav><a href="#">PROFILE</a></nav>
			<nav><a href="logout.php">LOGOUT</a></nav>
		</div>
	</header>
	<div class="title">
		<h1>Forum Genie Logiciel</h1>
		<h3>Bienvenue </h3>
		<ul class="colors">
			<li id="tds">Traveaux diriges</li>
			<li id="cours">cours</li>
			<li id="examens">examens</li>
		</ul>
	</div>
    <div class="wrapper">
        <form method="post" action="NewPostProcessing.php">
            <input class="postTitle" type="text" name="title" placeholder="Give this a title">
            <select name="type" class="postType">
                <option value="0" selected>Simple</option>
                <option value="1">TD/TD</option>
                <option value="2">cours</option>
                <option value="3">examen</option>
            </select>
            <div class="textarea">
                <textarea name="content"></textarea>
                <select name="semester" class="postType" required>
                	<option disabled selected>--Semester--</option>
	                <option value="1">S1</option>
	                <option value="2">S2</option>
	                <option value="3">S3</option>
	                <option value="4">S4</option>
	                <option value="5">S5</option>
	                <option value="6">S6</option>
            	</select>
            	
            	<select name="matiere" class="postType" required>
            		<option disabled selected>--Matiere--</option>
	                <option value="1">Matiere 1</option>
	                <option value="2">Matiere 2</option>
	                <option value="3">Matiere 3</option>
	                <option value="4">Matiere 4</option>
	                <option value="5">Matiere 5</option>
	                <option value="6">Matiere 6</option>
            	</select>
            </div>
            <input class="submit" type="submit" value="Add the post">
        </form>
</li>
    </ul>
        </div>
    </div>
</body>
</html>