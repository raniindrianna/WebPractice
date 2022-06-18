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
	<form action="" method="post">
		<input type="text" name="keyword" autofocus placeholder="Masukkan keyword nama" autocomplete="off">
		<button type="submit" name="cari">CARI</button>
	</form>
	<br><br>
	 <table border = 1 width="300">
	 	<tr>
	 		<th>NIM</th>
	 		<th>Nama</th>
	 		<th>Umur</th>
	 		
	 	</tr>

	<?php 
	$sql = "select * from mahasiswa ";


	function cari ($keyword){
		$kueri = "SELECT * FROM mahasiswa WHERE nama like '%".$keyword."%' ";
		return $kueri;
	}

	if(isset($_POST["cari"])){
		$sql = cari($_POST["keyword"]);
	}



	$result = $conn->query($sql);
	if ($result->num_rows > 0) {

  	// Menampilkan output 
  		while($row = $result->fetch_assoc()) { 
	?>

	 	<tr>
	 		<td><?php echo $row["nim"] ?> </td>
	 		<td><?php echo $row["nama"] ?> </td>
	 		<td><?php echo $row["umur"] ?> </td>
	 		<!--<td><a href="tampilsemua.php?nim=<?= $row["nim"]; ?>">detail</a></td>--!>
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