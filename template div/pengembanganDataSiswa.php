<?php
require 'functions.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_akademis";

// Membuat koneksi database
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .btn-search {
            text-align: center;
        }


        .table-bordered {
            width: 30px;
            height: 15px;
        }

        .tbl-content {
            height: 750px;
        }

        .table-striped>tbody>tr:nth-child(odd)>td,
        .table-striped>tbody>tr:nth-child(odd)>th {
            background-color: #DAEAF6;
        }

        .table-striped>tbody>tr:nth-child(even)>td,
        .table-striped>tbody>tr:nth-child(even)>th {
            background-color: #FFFFFF;
        }
    </style>
</head>

<body>

    <h1 align="center">DATA MAHASISWA</h1>



    <form action="" method="post">
        <div class="btn-search">
            <input type="text" name="keyword" autofocus placeholder="Masukkan keyword" autocomplete="off">
            <button type="submit" name="cari">SEARCH</button>
        </div>

    </form>

    <br><br>

    <a href="convertExcel.php" class="btn btn-info ">Export Excel</a>
    <br>
    <br>
    <a href="convertPDF.php" class="btn btn-info ">Export PDF</a>
    <br>
    <div class="tbl-content">
        <table border=1 width="300" align="center" class="table table-striped">

            <th style="text-align: center;">NIM</th>
            <th style="text-align: center;">Nama</th>
            <th style="text-align: center;">Umur</th>
            <th style="text-align: center;">Image</th>
            <th style="text-align: center;">Update</th>


            <?php
            $sql = "SELECT * from mahasiswa ";

            if (isset($_POST["cari"])) {
                $sql = cari($_POST["keyword"]);
            }

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {

                // Menampilkan output 
                while ($row = $result->fetch_assoc()) {
            ?>

                    <tr>
                        <td style="text-align: center;"><?php echo $row["nim"] ?> </td>
                        <td style="text-align: center;"><?php echo $row["nama"] ?> </td>
                        <td style="text-align: center;"><?php echo $row["umur"] ?> </td>
                        <td align="center"><img src="images/<?= $row["image"]; ?>" width="90px" height="90px"></td>
                        <td style="text-align: center;"><button class="btn btn-info" align="center"><a style="color: #FFFFFF; font-weight: bolder;" href="update.php?nim=<?= $row["nim"]; ?>">Update</a></button> <button class="btn btn-danger" align="center">
                                <a style="color: #FFFFFF; font-weight: bolder;" href="delete.php?nim=<?= $row["nim"]; ?>">Delete</a></button></td>

                    </tr>

            <?php
                }
            } else {
                echo "No Results"; //jika data kosong
            }

            ?>

        </table>
    </div>

</body>

</html>