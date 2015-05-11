<?php

    /*subject array here*/
    $subjects_array_s3 = array(
                            'tech_de_web' => "Technologie de web",
                            'tech_de_web' => "Technologie de web",
                            'tech_de_web' => "Technologie de web",
                            'tech_de_web' => "Technologie de web",
                            'tech_de_web' => "Technologie de web",
                            'tech_de_web' => "Technologie de web"
    )

?>
<!DOCTYPE html>
<html>
<head>
	<title>Forum gl</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../styles/main.css">
	<script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/main.js"></script>
    <script>
//        $(document).ready(function() {
//     $('tr td:nth-child(1)').hide();
// });
    </script>
</head>
<body>
	<header>
		<div class="bar">
			<nav><a href="#">HOME</a></nav>
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
                <li><a href="#">NEW</a></li>
            </ul>
        </div>
        <table class="semestre-table" cellspacing="0">
            <ul>
                <li>

                    <th>
                        <a class="backto" onclick="history.go(-1);">BACK</a>
                        MATIERES
                    </th>
                <li>
                    <tr>
                        <td class="semester-in">PREMIER SEMESTRE</td>
                    </tr>
                        <ul>
                        </li>
                        <li>
                            <tr>
                                <td class="nummatiere" onclick="location.href='?semester=1';">ARCHITECTURE DES ORDINATEURS</td>
                            </tr>
                        </li>
                        <li>
                            <tr>
                                <td class="nummatiere" onclick="location.href='?semester=1';">ALGEBRE I</td>
                            </tr>
                        </li>
                        <li>
                            <tr>
                                <td class="nummatiere" onclick="location.href='?semester=1';">ANALYSE I</td>
                            </tr>
                        </li>
                        <li>
                            <tr>
                                <td class="nummatiere" onclick="location.href='?semester=1';">RESEAUX</td>
                            </tr>
                        </li>
                        <li>
                            <tr>
                                <td class="nummatiere" onclick="location.href='?semester=1';">PROGRAMMATION EN C</td>
                            </tr>
                        </li>
                        <li>
                            <tr>
                                <td class="nummatiere" onclick="location.href='?semester=1';">FRANCAIS/ANGLAIS</td>
                            </tr>
                        </li>
                        </ul>
                </li>
            </ul>
        </table>
        <table class="main-table" cellspacing="0">
            <thead>
                <tr class="head">
                    <th id="author">AUTHOR</th>
                    <th id="date">DATE</th>
                    <th id="color"></th>
                    <th id="title">TITLE</th>
                </tr>
            </thead>
            <tbody>
            <tr class="nopost">
               <td colspan="4"> NO POST HAS BEEN POSTED IN THAT POST SECTION.</td>
               </tr>
            </tbody>
        </table>
    </div>
</body>
</html>