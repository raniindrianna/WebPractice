<?php 
require 'functions.php';

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
		<input type="text" name="keyword" autofocus placeholder="Masukkan keyword" autocomplete="off">
		<button type="submit" name="cari">SEARCH</button>
	</form>

	<br><br>
	 <table border = 1 width="500">
	 	<tr>
	 		<th>NIM</th>
	 		<th>Nama</th>
	 		<th>Umur</th>
			<th>Image</th>
			<th>Update</th>
	 	</tr>

	<?php 
	$sql = "SELECT * from mahasiswa ";

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
			 <td align="center"><img src="images/<?= $row["image"];?>" width="90px" height="90px"></td>		
			<td><a href="update.php?nim=<?= $row["nim"];?>">Update</a></td>
		
	 	</tr>

	 <?php   
		}
	} else {
  	echo "No Results"; //jika data kosong
	} 

 	?>
	 
	 </table>
	
		<a href="template.php?page=insert.php">Menambahkan Mahasiswa</a>
	
	

</body>
</html>

