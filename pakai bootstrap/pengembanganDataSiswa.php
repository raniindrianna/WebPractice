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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		.table-bordered {
			width: 560px;
			height: 200px;
		}

		.table-striped>tbody>tr:nth-child(odd)>td,
		.table-striped>tbody>tr:nth-child(odd)>th {
			background-color: #DAEAF6;
		}

		.table-striped>tbody>tr:nth-child(even)>td,
		.table-striped>tbody>tr:nth-child(even)>th {
			background-color: #FFFFFF;
		}
	</style>
</head>

<body>
	<form action="" method="post">
		<input type="text" name="keyword" autofocus placeholder="Masukkan keyword" autocomplete="off">
		<button type="submit" name="cari">SEARCH</button>
	</form>

	<br><br>
	<table border=1 width="500" class="table table-striped">
		<tr>
			<th>NIM</th>
			<th>Nama</th>
			<th>Umur</th>
			<th>Image</th>
			<th>Update</th>
		</tr>

		<?php
		$sql = "SELECT * from mahasiswa ";

		if (isset($_POST["cari"])) {
			$sql = cari($_POST["keyword"]);
		}

		$result = $conn->query($sql);
		if ($result->num_rows > 0) {

			// Menampilkan output 
			while ($row = $result->fetch_assoc()) {
		?>

				<tr>

					<td><?php echo $row["nim"] ?> </td>
					<td><?php echo $row["nama"] ?> </td>
					<td><?php echo $row["umur"] ?> </td>
					<td align="center"><img src="images/<?= $row["image"]; ?>" width="90px" height="90px"></td>
					<td><button class="btn btn-success"><a href="update.php?nim=<?= $row["nim"]; ?>">Update</a></button></td>

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