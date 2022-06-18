<?php
$conn = mysqli_connect("localhost", "root", "", "db_akademis");

if (isset($_POST["submit"])) {
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $umur = $_POST["umur"];

    $image = upload();

    if (!$image) {
        return false;
    }

    $query = "INSERT INTO mahasiswa SET nim='$nim', nama='$nama', umur='$umur', image='$image'";
    mysqli_query($conn, $query);
}

function upload()
{
    $nama_file = $_FILES['pict']['name']; //'foto' didapat dari name di form
    $ukuran_file = $_FILES['pict']['size'];
    $error = $_FILES['pict']['error'];
    $temp_name = $_FILES['pict']['tmp_name'];

    $ekstensiGambarYangValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $nama_file);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if ($ukuran_file > 10000000) {
        echo "<script>
					alert('ukuran terlalu besar');
					</script>";
        return false;
    }

    //jika lolos pengecekan , maka gambar siap diupload
    move_uploaded_file($temp_name, 'images/' . $nama_file);
    return $nama_file;
}
?>

<html>

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
        <h1 align="center">INSERT MAHASISWA</h1>
        <div class="form-add">
            <form action=" " method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nim">NIM</label>
                    <div class="col-sm-10"></div>
                    <input type="text" name="nim" id="nim" class="form-control" autocomplete="off">
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="nama">NAMA</label>
                    <div class="col-sm-10"></div>
                    <input type="text" name="nama" id="nama" class="form-control" autocomplete="off">
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="umur">UMUR:</label>
                    <div class="col-sm-10"></div>
                    <input type="text" name="umur" id="umur" class="form-control" autocomplete="off">
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="pict">FOTO:</label>
                    <div class="col-sm-10"></div>
                    <input type="file" name="pict" id="pict" class="form-control">
                </div>
                <br>

                <button class="btn btn-primary" type="submit" value="submit" name="submit">SAVE</button>
            </form>
        </div>
    </div>

</body>

</html>