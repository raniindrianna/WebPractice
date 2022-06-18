<?php
$servername = "localhost";
$username = "root";
$database = "db_akademis";
$password = "";

//membuat koneksi database
$conn = new mysqli($servername, $username, $password, $database);

//check koneksi
if($conn->connect_error) {
    die("koneksi gagal: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<body>
<table border="1" width="350">
  <tr>
   <td>NIM</td>
   <td>NAMA</td>
  </tr>

<?php
$sql = "SELECT * from mahasiswa";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    //menampilkan output   
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row["nim"]?> </td>
            <td><?php echo $row["nama"]?> </td>
            <td><a href="tampil.php?nama=<?= $row["nama"]; ?>">profile</a></td>
    </tr>

    <?php 
    }
} else {
    echo "0 results";
}

?>
</table>
</body>
</html>