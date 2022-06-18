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
