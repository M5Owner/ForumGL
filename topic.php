<?php
   // $path = "includes/database/connection.php";
	//include("includes/site_apis/class.posts.php");
	
	//adding comment if demanded
	
	if(isset($_POST['input'])){
		$usr_idd = $currentUser->getIdByUsername($_SESSION['username']);
		$cmt_res = $posts->addNewComment($_GET['readtopic'],$usr_idd,$_POST['input']);
		if ($cmt_res)
			echo "<script> alert('Commentaire Ajoutée'); </script>";
	}
	
	$post_id = isset($_GET['readtopic']) ? (int)$_GET['readtopic'] : "";
	if ($post_id != ""){
		$res = $posts->postDisplaying($post_id);
		$coms = $posts->commentsDisplaying($post_id);
	}
	else {/*display a 404 message*/}
	
?>
<!DOCTYPE html>
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
        <table class="addtopicform" cellspacing="0">
            <thead>
                <tr class="titletopic">
                    <th id="titletopic"><?php echo $res['post_title']; ?></th>
                    <th class="pathtotopic">Forum GL > SEMESTER <?php echo $res['semester']; ?> ></th>
                </tr>
            </thead>
            <tbody>
                <tr class="contenttopic">
                    <td class="userinfos">
                        <p class="userinfos-pic"><img src=""></p>
                        <p class="userinfos-name"><?php echo $res['full_name']; ?></p>
                        <p class="userinfos-lastlogin"><?php echo $res['pub_date'] ?></p>
                        <p class="userinfos-semester"><?php echo "SEMESTER ".$res['semester']; ?></p>
                    </td>
                    <td class="contentpart">
                        <?php echo $res['post_content'];  ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="linesep">LES COMMENTAIRES</div>
        <table class="commentform">
        	<?php foreach ($coms as $val){ ?>
        <tr class="contentcomment">
                    <td class="userinfoscom">
                        <p class="userinfos-name"><?php echo $val['user_name']; ?></p> 
                    </td>
                    <td class="commentpart">
                        <?php echo $val['cmt_content']; ?>
                    </td>
        </tr>
        <?php } ?>
            <tr class="contentcomment">
                    <td class="userinfoscom">
                        <p class="userinfos-name"><?php echo $_SESSION['username']; ?></p> 
                    </td>
                    <td class="commentpart">
                        <form method="post">
                            <textarea name="input" class="comnt" placeholder="Comments"></textarea>
                            <div class="little_bar">
                                <ul>
                                <li><input class="sub" type="submit" value="commenter"></li>
                                </ul>
                            </div>
                        </form>
                    </td>
        </tr>
        </table>
    </div>


</body>
</html>