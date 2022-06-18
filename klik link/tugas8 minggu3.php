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
	 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	 <table border = 1 width="300">
	 	<tr>
	 		<th>NIM</th>
	 		<th>profile</th>
	 	</tr>

	

	<?php 
	$sql = "SELECT * from mahasiswa";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {

  	// Menampilkan output 
  		while($row = $result->fetch_assoc()) { 
	?>


	 	<tr>
	 		<td><?php echo $row["nim"] ?> </td>
	 		<td><a href="tampil.php?nim=<?= $row["nim"]; ?>">detail mahasiswa</a></td>
	 	</tr>

	 <?php   
		}
	} else {
  	echo "0 results"; //jika data kosong
	} 	
 	?>
	 </table>




</body>
</html>