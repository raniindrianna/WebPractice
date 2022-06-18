<?php
require 'pengembanganDataSiswa.php';

function delete($nim)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_akademis";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = $conn->query("SELECT* FROM mahasiswa WHERE nim = '$nim'");
    $data =  $sql->fetch_assoc();
    $image = $data['image'];
    if (file_exists("images/$image")) {
        unlink(
            "images/$image"
        );
    }

    $sql = $conn->query("DELETE FROM mahasiswa WHERE nim='$nim'");

    return 1;
}

$nim = $_GET["nim"];

if (delete($nim) > 0) {
    echo "<script>alert('Berhasil dihapus');
        document.location.href = 'template.php'; 
    </script>";
} else {
    echo "<script>alert('Gagal dihapus');
        document.location.href = 'template.php'; 
    </script>";
}
