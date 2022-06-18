<?php
session_start();
if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <style>
        .header {

            background-color: #C4FAF8;
            border-style: double;

        }


        .nav {
            background-color: #AFF8DB;
            border-style: double;

        }

        .nav a {
            margin: 15px;

        }

        .content {
            height: 750px;
            border-style: double;

            /* margin-left:310px; */
        }



        .footer {

            background-color: #C4FAF8;
            border-style: double;
            /* height : 150px; */
        }
    </style>

    <title>Template</title>

</head>

<body>
    <div class="container">
        <div class="header">

            <h1 align="center">HEADER</h1>
        </div>


        <div class="nav">
            <td style="text-align: center;"><a href="template.php?page=home.php"> HOME</a></td>
            <a href="template.php?page=berita.php">BERITA</a>
            <a href="template.php?page=pengembanganDataSiswa.php">DATA MAHASISWA</a>
            <a href="template.php?page=insert.php">INSERT MAHASISWA</a>
            <a href="logout.php">LOGOUT</a>
        </div>

        <div class="content">
            <?php
            if (!empty($_GET['page'])) {
                include $_GET['page'];
            } else {
                include "home.php";
            }
            ?>


        </div>

        <div class="footer">

            <h1 align="center">FOOTER</h1>
        </div>
    </div>
</body>

</html>