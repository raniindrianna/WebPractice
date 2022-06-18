<?php 
		// $servername = "localhost";
		// $username = "root";
		// $password = "";
		// $dbname = "db_akademis";

		// // Membuat koneksi database
		// $conn = new mysqli($servername, $username, $password, $dbname);
		// // Check connection
		// if ($conn->connect_error) {
		//   die("Koneksi Gagal: " . $conn->connect_error);
		// }

	$conn = mysqli_connect("localhost","root","","db_akademis");
	
	
	if (isset($_POST["submit"])) {
			$nim = $_POST["nim"];
			$nama = $_POST["nama"];
			$umur = $_POST["umur"];

			$query = "INSERT INTO mahasiswa SET nim='$nim', nama='$nama', umur='$umur'";
			mysqli_query($conn, $query);
		}	

	 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
 <body>
 	<form action="" method="post">
 		<ul>
 			<li>
 				<label for = "nim">NIM : </label>
 				<input type="text" name="nim" id="nim">
 			</li>
 			<br>
 			<li>
 				<label for = "nama">NAMA : </label>
 				<input type="text" name="nama" id="nama">
 			</li>
 			<br>
 			<li>
 				<label for = "umur">UMUR : </label>
 				<input type="text" name="umur" id="umur">
 			</li>

 			<li>
 				<button type="submit" name="submit" >SUBMIT</button>
 			</li>

 		</ul>

 		
 		
 	</form>
 </body>
</html>