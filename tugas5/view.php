<html>
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
        $sql='SELECT * FROM mahasiswa';
	 ?>

     <body>
         <table border="1" align="center">
             <tr>
                 <th>NIM</th>
                 <th>NAMA</th>
                 <th>Umur</th>
                 <th>Image</th>
             </tr>

             <?php
             echo "<br>";
             $result=$conn->query($sql);
             if($result->num_rows > 0) {
                 while ($row = $result->fetch_assoc()) {  ?>
                    <tr>
                        <td> <?php echo $row['nim']; ?> </td>
                        <td> <?php echo $row['nama']; ?></td>
                        <td> <?php echo $row['umur']; ?></td>
                        <td> <a href="template.php?page=display.php&id=<?php echo $row['nim']; ?>">view detail></a></td>
                        <td><a href="template.php?page=update.php&id=<?php echo $row['nim']?>">update</a></td>
                        <td align="center"><img src="images/<?php echo $row['pict']?>" alt="null" width="200" height="100"></td>
                    </tr>
                    <?php
                 }
             }
             else {
                 echo "0 results";
             }
             ?>
             </table>
            </body>
            </html>