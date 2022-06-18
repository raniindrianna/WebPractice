<?php 
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
