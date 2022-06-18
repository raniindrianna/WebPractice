<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_nilai";

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

</head>

<body>

    <h1 align="center">DATA PENILAIAN MAHASISWA</h1>

    <br></br>

    <a href="convertExcel.php" class="btn btn-info ">Export Excel</a>
    <br>
    <br>
    <a href="convertPDF.php" class="btn btn-info ">Export PDF</a>
    <br>
    <div class="tbl-content">
        <table border=1 width="300" align="center" class="table table-striped">
            <tr?>

                <th style="text-align: center;">NIM</th>
                <th style="text-align: center;">Nama</th>
                <th style="text-align: center;">UTS</th>
                <th style="text-align: center;">UAS</th>
                <th style="text-align: center;">TGS</th>
                <th style="text-align: center;">Nilai FINAL</th>
                <th style="text-align: center;">Image</th>

                </tr>

                <?php
                $sql = "SELECT * from penilaian ";



                $result = $conn->query($sql);
                if ($result->num_rows > 0) {

                    // Menampilkan output 
                    while ($row = $result->fetch_assoc()) {
                ?>

                        <tr>
                            <td style="text-align: center;"><?php echo $row["Nim"] ?> </td>
                            <td style="text-align: center;"><?php echo $row["Nama"] ?> </td>
                            <td style="text-align: center;"><?php echo $row["UTS"] ?> </td>
                            <td style="text-align: center;"><?php echo $row["UAS"] ?> </td>
                            <td style="text-align: center;"><?php echo $row["TGS"] ?> </td>
                            <td style="text-align: center;"><?php echo $row["NilaiFinal"] ?> </td>
                            <td align="center"><img src="images/<?= $row["pict"] ?>" width="90px" height="90px"></td>

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