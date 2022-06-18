<?php
    require 'functions.php';
    $conn = mysqli_connect("localhost","root","","db_akademis");

    if (isset($_GET["nim"])) {
        $nim = $_GET["nim"];
    }

	$kueri = mysqli_query($conn, "Select * from mahasiswa where nim = '$nim'");
	$res = mysqli_fetch_array($kueri);

    if (isset($_POST["save"])) {
        $query = update($nim);
        mysqli_query($conn, $query);
    }
 ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UPDATE DATA</title>
</head>

<body>
    <form action="" method="POST" enctype ="multipart/form-data">
		<table>
			<tr>
 				<td>NIM : </td>
 				<td><input type="text" disabled autocomplete="off" name="nim" id="nim" required value=<?= $nim ?>></td> 
			</tr>

			<tr>
				<td>NAMA : </td>
 				<td><input type="text" name="nama" id="nama" autocomplete="off"></td>
			</tr>
 				
			<tr>
				<td>UMUR : </td>
 				<td><input type="text" name="umur" id="umur" autocomplete="off"> </td>		
			</tr>
 				
			<tr>
				<td>FOTO : </td>
 				<td><input type="file" name="image" id="image" autocomplete="off"></td>	
			</tr>
 						
			<tr>
			<td colspan="2"><button type="submit" name="save">SAVE</button></td> 
			</tr>

			<tr>
			<td><a href="pengembanganDataSiswa.php">Kembali</a></td>
		</tr>

			
			
 							
 		</table>
    </form>

</body>
</html>