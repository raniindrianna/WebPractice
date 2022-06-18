<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_kursus";

// Membuat koneksi database
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}
session_start();


$sql = "SELECT * FROM kursus WHERE id_kursus = '" . $_GET['id'] . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$isi_cart = 0;

if ($_SESSION['nama_kursus'] == '') {
    $_SESSION['id_kursus'] = array();
    $_SESSION['nama_kursus'] = array();
    $_SESSION['kapasitas_kursus'] = array();
    $_SESSION['harga_kursus'] = array();
    $_SESSION['id_kursus'][$isi_cart] = $row['id_kursus'];
    $_SESSION['nama_kursus'][$isi_cart] = $row['nama_kursus'];
    $_SESSION['kapasitas_kursus'][$isi_cart] = 1;
    $_SESSION['harga_kursus'][$isi_cart] = $row['harga_kursus'];
} else {
    $isi_cart = count($_SESSION['nama_kursus']);
    $ketemu = false;
    for ($i = 0; $i < count($_SESSION['nama_kursus']); $i = $i + 1) {
        if ($row['nama_kursus'] == $_SESSION['nama_kursus'][$i]) {
            $ketemu = true;
            $tanda = $i;
        }
    }
    if ($ketemu == true) {
        $_SESSION['kapasitas_kursus'][$tanda] = $_SESSION['kapasitas_kursus'][$tanda] + 1;
    } else {
        $_SESSION['id_kursus'][$isi_cart] = $row['id_kursus'];
        $_SESSION['nama_kursus'][$isi_cart] = $row['nama_kursus'];
        $_SESSION['kapasitas_kursus'][$isi_cart] = 1;
        $_SESSION['harga_kursus'][$isi_cart] = $row['harga_kursus'];
    }
}

header('location:displayCourseCart.php');
