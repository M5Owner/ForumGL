<?php
	$res = $posts->postsDisplaying();
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
        <div class="little_bar">
            <ul>
                <li><a href="?addtopic">NEW</a></li>
            </ul>
        </div>
        <table class="semestre-table" cellspacing="0">
            <th>SEMESTRES</th>
            <tr>
                <td class="numsem" onclick="location.href='?semester=1';">PREMIER</td>
            </tr>
            <tr>
                <td class="numsem" onclick="location.href='?semester=2';">DEUXIEME</td>
            </tr>
            <tr>
                <td class="numsem" onclick="location.href='?semester=3';">TROISIEME</td>
            </tr>
            <tr>
                <td class="numsem" onclick="location.href='?semester=4';">QUATRIEME</td>
            </tr>
            <tr>
                <td class="numsem" onclick="location.href='?semester=5';">CINQUIEME</td>
            </tr>
            <tr>
                <td class="numsem" onclick="location.href='?semester=6';">SIXIEME</td>
            </tr>
        </table>
        <table class="main-table" cellspacing="0">
            <thead>
                <tr class="head">
                    <th id="author">USER</th>
                    <th id="date">DATE</th>
                    <th id="color"></th>
                    <th id="title">TITRE</th>
                </tr>
            </thead>
            <tbody>
                
               	<?php	foreach ($res as $val) { ?>
                <tr>
                    <td class="threaduser"> <?php echo $val['user_name'];?> </td>
                    <td class="threaddate"> <?php echo strftime("%d/%m/%Y",strtotime($val['pub_date']));?></td>
                    <td class="<?php echo postType($val['pub_type']); ?>"></td>
                    <td class="threadnum" onclick="location.href='?readtopic=<?php echo $val['id_post']; ?>';"><?php echo $val['post_title'];?></td>
                </tr>
                <?php } ?>
                

            </tbody>
        </table>
    </div>
</body>
</html>