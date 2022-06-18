<?php 
$conn = mysqli_connect("localhost","root","","db_akademis");

if (isset($_GET["nim"])) {
	$nim = $_GET["nim"];
}

$query = mysqli_query($conn,"SELECT * from mahasiswa where nim='$nim'");
$result = mysqli_fetch_array($query);


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile Mahasiswa</title>
</head>
<body>
	<table border="1px" width="30px">
		<tr>
			<th>NIM</th>
			<th>Nama</th>
			<th>Umur</th>
		</tr>
		<tr>
			<td><?php echo $result['nim'] ?></td>
			<td><?php echo $result['nama'] ?></td>
			<td><?php echo $result['umur'] ?></td>
		</tr>
		<tr>
			<td><a href="tugas8 minggu3.php">Kembali</a></td>
		</tr>
	</table>
	
</body>
</html>