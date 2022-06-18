<?php

$conn = mysqli_connect("localhost", "root", "", "db_akademis");

if (isset($_GET["nim"])) {
    $nim = $_GET["nim"];
}
$mhs = mysqli_query($conn, "SELECT * from mahasiswa where nim='$nim' ");
$result = mysqli_fetch_array($mhs);


function update($nim_mhs)
{
    $conn = mysqli_connect("localhost", "root", "", "db_akademis");

    $nama = $_POST["nama"];
    $umur = $_POST["umur"];
    $namaFile = $_FILES['image']['name']; //'foto' didapat dari name di form
    $tempName = $_FILES['image']['tmp_name'];

    //cek apakah foto memenuhi syarat


    if ($tempName != "") {
        move_uploaded_file($tempName, 'images/' . $namaFile);

        //cek apakah yang diupload adalah gambar
        $ekstensiGambarYangValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        //kalau tidak ada didalam ekstensi yang valid maka berikan pesan
        if (!in_array($ekstensiGambar, $ekstensiGambarYangValid)) {
            echo "<script>
                    alert('yang anda upload bukan gambar');
                </script>";
            return false;
        }

        $sql = $conn->query("SELECT* FROM mahasiswa WHERE nim = '$nim_mhs'");

        $data =  $sql->fetch_assoc();
        $image = $data['image'];
        if (file_exists("images/$image")) {
            unlink(
                "images/$image"
            );
        }

        $kueri = "UPDATE mahasiswa SET  nama='$nama', umur='$umur', image='$namaFile' where nim='$nim_mhs' ";
    } else {
        $kueri = "UPDATE mahasiswa SET  nama='$nama', umur='$umur' where nim='$nim_mhs' ";
    }


    return $kueri;
}


if (isset($_POST["save"])) {
    $query = update($nim);
    mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .form-add {
            padding-left: 140px;
            padding-right: 140px;
            padding-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 align="center">UPDATE MAHASISWA</h1>
        <div class="form-update"></div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">

                <label class="control-label col-sm-2" for="nim">NIM</label>
                <div class="col-sm-10"></div>
                <input type="text" name="nim" id="nim" value="<?= $result["nim"]; ?>" class="form-control" disabled autocomplete="off" required value=<?= $nim ?>>


                <div class="form-group">
                    <label class="control-label col-sm-2" for="nama">NAMA</label>
                    <div class="col-sm-10"></div>
                    <input type="text" name="nama" value="<?= $result["nama"]; ?>" id=" nama" class="form-control" autocomplete="off">
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="umur">UMUR:</label>
                    <div class="col-sm-10"></div>
                    <input type="text" name="umur" value="<?= $result["umur"]; ?>" id=" umur" class="form-control" autocomplete="off">
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2" for="image">FOTO:</label>
                    <div class="col-sm-10"></div>
                    <input type="file" name="image" value="<?= $result["image"]; ?>" id=" image" class="form-control">
                </div>
                <br>

                <a href="template.php?page=pengembanganDataSiswa.php" class="btn btn-info">BACK</a>
                <button class="btn btn-primary" type="submit" value="submit" name="save">SAVE</button>

                </table>
        </form>
    </div>
</body>

</html>