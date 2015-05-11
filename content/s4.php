<?php

    /*subject array here*/
   $subjects_array = array(
                            'archi' => '41',
                            'algebre1' => '42' ,
                            'analyse1' => "43",
                            'networking' => "44",
                            'prog_c' => "45",
                            'freng' => "46"
    );

    if(isset($_GET['subject'])){
        $sub = $subjects_array[$_GET['subject']] ? $subjects_array[$_GET['subject']] : header('location: ./?semester=4');
        $res = $posts->postsDisplaying($_GET['semester'],$sub);
    }else{
    $res = $posts->postsDisplaying($_GET['semester']);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forum gl</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
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
            <ul>
                <li>

                    <th>
                        <a class="backto" onclick="history.go(-1);">BACK</a>
                        MATIERES
                    </th>
                <li>
                     <tr>
                        <td class="semester-in" onclick="location.href='?semester=4'">QUATRIEME SEMESTRE</td>
                    </tr>
                        <ul>
                        </li>
                        <li>
                            <tr>
                                <td class="nummatiere <?php echo ($subjects_array[$_GET['subject']] == "41") ? "matiere-in" : ""; ?>" onclick="location.href='?semester=4&subject=archi';">ARCHITECTURE DES ORDINATEURS</td>
                            </tr>
                        </li>
                        <li>
                            <tr>
                                <td class="nummatiere <?php echo ($subjects_array[$_GET['subject']] == "42") ? "matiere-in" : ""; ?>" onclick="location.href='?semester=4&subject=algebre1';">ALGEBRE I</td>
                            </tr>
                        </li>
                        <li>
                            <tr>
                                <td class="nummatiere <?php echo ($subjects_array[$_GET['subject']] == "43") ? "matiere-in" : ""; ?>" onclick="location.href='?semester=4&subject=analyse1';">ANALYSE I</td>
                            </tr>
                        </li>
                        <li>
                            <tr>
                                <td class="nummatiere <?php echo ($subjects_array[$_GET['subject']] == "44") ? "matiere-in" : ""; ?>" onclick="location.href='?semester=4&subject=networking';">RESEAUX</td>
                            </tr>
                        </li>
                        <li>
                            <tr>
                                <td class="nummatiere <?php echo ($subjects_array[$_GET['subject']] == "45") ? "matiere-in" : ""; ?>" onclick="location.href='?semester=4&subject=prog_c';">PROGRAMMATION EN C</td>
                            </tr>
                        </li>
                        <li>
                            <tr>
                                <td class="nummatiere <?php echo ($subjects_array[$_GET['subject']] == "46") ? "matiere-in" : ""; ?>" onclick="location.href='?semester=4&subject=freng';">FRANCAIS/ANGLAIS</td>
                            </tr>
                        </li>
                        </ul>
                </li>
            </ul>
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
                <tr class="p_u_b">
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