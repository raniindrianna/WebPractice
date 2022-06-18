<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akademik_db";

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


    <div class="tbl-content">
        <table border=1 width="300" align="center" class="table table-striped">
            <tr?>

                <th style="text-align: center;">NIM</th>
                <th style="text-align: center;">Nama</th>
                <th style="text-align: center;">Kode Matkul</th>
                <th style="text-align: center;">Nama Matkul</th>
                <th style="text-align: center;">Indeks Nilai</th>



                </tr>

                <?php
                $sql = "SELECT mhs.nim AS nim, mhs.nama as nama , matkul.kodematkul as kodematkul , matkul.namamatkul as namamatkul , nilai.indeks as indeksnilai from nilai inner join  mhs on mhs.nim = nilai.nim inner join matkul on matkul.kodematkul = nilai.kodematkul";



                $result = $conn->query($sql);
                if ($result->num_rows > 0) {

                    // Menampilkan output 
                    while ($row = $result->fetch_assoc()) {
                ?>

                        <tr>
                            <td style="text-align: center;"><?php echo $row["nim"] ?> </td>
                            <td style="text-align: center;"><?php echo $row["nama"] ?> </td>
                            <td style="text-align: center;"><?php echo $row["kodematkul"] ?> </td>
                            <td style="text-align: center;"><?php echo $row["namamatkul"] ?> </td>
                            <td style="text-align: center;"><?php echo $row["indeksnilai"] ?> </td>



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