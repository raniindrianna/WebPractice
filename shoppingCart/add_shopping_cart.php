<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cart";

// Membuat koneksi database
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}
session_start();
$sql = "SELECT * FROM barang WHERE kode_barang = '" . $_GET['id'] . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$isi_cart = 0;

if ($_SESSION['nama_barang'] == '') {
    $_SESSION['kode_barang'] = array();
    $_SESSION['nama_barang'] = array();
    $_SESSION['quantity'] = array();
    $_SESSION['harga'] = array();
    $_SESSION['kode_barang'][$isi_cart] = $row['kode_barang'];
    $_SESSION['nama_barang'][$isi_cart] = $row['nama_barang'];
    $_SESSION['quantity'][$isi_cart] = 1;
    $_SESSION['harga'][$isi_cart] = $row['harga_barang'];
} else {
    $isi_cart = count($_SESSION['nama_barang']);
    $ketemu = false;
    for ($i = 0; $i < count($_SESSION['nama_barang']); $i = $i + 1) {
        if ($row['nama_barang'] == $_SESSION['nama_barang'][$i]) {
            $ketemu = true;
            $tanda = $i;
        }
    }
    if ($ketemu == true) {
        $_SESSION['quantity'][$tanda] = $_SESSION['quantity'][$tanda] + 1;
    } else {
        $_SESSION['kode_barang'][$isi_cart] = $row['kode_barang'];
        $_SESSION['nama_barang'][$isi_cart] = $row['nama_barang'];
        $_SESSION['quantity'][$isi_cart] = 1;
        $_SESSION['harga'][$isi_cart] = $row['harga_barang'];
    }
}

header('location:display_shopping_cart.php');
