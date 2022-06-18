<?php
			$conn = mysqli_connect("localhost","root","","db_akademis");
	
			if (isset($_POST["submit"])) {
					$nim = $_POST["nim"];
					$nama = $_POST["nama"];
					$umur = $_POST["umur"];

					$image=upload();

					if(!$image) {
						return false;
					}
		
					$query = "INSERT INTO mahasiswa SET nim='$nim', nama='$nama', umur='$umur', image='$image'";
					mysqli_query($conn, $query);
				}	
		
		function upload(){
			$nama_file = $_FILES['pict']['name']; //'foto' didapat dari name di form
			$ukuran_file = $_FILES['pict']['size'];
			$error = $_FILES['pict']['error'];
			$temp_name = $_FILES['pict']['tmp_name'];

			$ekstensiGambarYangValid = ['jpg','jpeg','png'];
			$ekstensiGambar = explode('.',$nama_file);
			$ekstensiGambar = strtolower(end($ekstensiGambar));

			if(!in_array($ekstensiGambar, $ekstensiGambarYangValid)){
				echo "<script>
					alert('yang anda upload bukan gambar');
				</script>";
				return false;
		}
	
		//jika lolos pengecekan , maka gambar siap diupload
		move_uploaded_file($temp_name, 'images/' . $nama_file);
		return $nama_file;
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
 	<form action=" " method="post" enctype ="multipart/form-data">
		 <table>
			 <tr>
 				<td for = "nim">NIM : </td>
 				<td><input type="text" name="nim" id="nim"></td>
			</td>

			<tr>
				<td>NAMA : </td>
 				<td><input type="text" name="nama" id="nama"></td>
			</tr>
 				
 			<tr>
				<td>UMUR : </td> 
				<td><input type="text" name="umur" id="umur"></td>
			 </tr>
 			
			 <tr>
				<td>FOTO : </td>
 				<td><input type="file" name="pict" id="pict" autocomplete="off"></td>
			 </tr>
 						
				<tr>
 					<td colspan="2"><button type="submit" value="submit" name="submit">SAVE</button>
				</tr>
			</table>
		</body>
	</form>
</html>