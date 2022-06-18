<?php
session_start();
include('connection.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Form Data Pembeli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <h2 class="row justify-content-center">Form Data Pembeli</h2>

    <div class="container pt-4 pb-4" style="margin-top: 10px;">
        <form method="POST" enctype="multipart/form-data" action="invoice.php">

            <div class="mx-auto col-sm-4 mb-3 p-3 rounded border" style="width: 300px;">
                <label for="nama_pembeli" class="form-label ">Nama Pembeli</label>
                <input class="form-control mb-3 rounded-pill" name="nama_pembeli" id="nama_pembeli" type="text" placeholder="Masukan Nama Anda" aria-label="Nama Pembeli" required>

                <label for="no_hp" class="form-label ">Nomor HP</label>
                <input class="form-control mb-3 rounded-pill" name="no_hp" id="no_hp" type="text" placeholder="Masukan Nomor HP Anda" aria-label="Nomor HP" required>

                <label for="alamat" class="form-label">Alamat</label>
                <input class="form-control mb-3 rounded-pill" name="alamat" id="alamat" type="text" placeholder="Masukan Alamat Anda" aria-label="Alamat" required>

                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input class="form-control mb-3 rounded-pill" name="kecamatan" id="kecamatan" type="text" placeholder="Masukkan kecamatan Anda" aria-label="Kecamatan" required>

                <label for="kota" class="form-label">Kota</label>
                <input class="form-control mb-3 rounded-pill" name="kota" id="kota" type="text" placeholder="Masukkan kota Anda" aria-label="Kota" required>

                <button type="submit" name="simpan" class="btn btn-primary w-100 rounded-pill">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['simpan'])) {
    $id_transaksi    = time();
    $nama_pembeli   = $_POST['nama_pembeli'];
    $no_hp       = $_POST['no_hp'];
    $alamat         = $_POST['alamat'];
    $kecamatan      = $_POST['kecamatan'];
    $kota           = $_POST['kota'];
    $total_transaksi = $_SESSION['total'];

    if ($nama_pembeli == '' || $no_hp == '' || $alamat == '' || $kecamatan == '' || $kota == '') {
        echo '<script>alert("Data harus terisi semua!")</script>';
    } else {
        $kapasitas_kursus = array();
        $jumlah_jual    = array();
        $i = 0;

        while ($i < count($_SESSION['nama_kursus'])) {
            $id_kursus         = $_SESSION['id_kursus'][$i];
            $nama_brg             = $_SESSION['nama_kursus'][$i];
            $harga_jual         = $_SESSION['harga_kursus'][$i];
            $jumlah_jual[$i]     = $_SESSION['kapasitas_kursus'][$i];

            // Query cek stok barang
            $query = "SELECT * FROM kursus WHERE id_kursus = '$id_kursus'";
            $result = mysqli_query($conn, $query);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $kapasitas_kursus[$i] = $row["kapasitas_kursus"];
                }
            } else {
                echo "0 results";
            }


            if (min($kapasitas_kursus) != 0) {
                // Query Insert ke tabel transaksi penjualan 
                $query = "INSERT INTO penjualan SET id_transaksi = $id_transaksi, nama_pembeli = '$nama_pembeli', no_hp = '$no_hp', alamat = '$alamat', kecamatan = '$kecamatan', kota = '$kota', total_transaksi= $total_transaksi";
                $result = mysqli_query($conn, $query);

                // Query Insert ke tabel jual
                $query = "INSERT INTO jual SET id_transaksi = $id_transaksi, id_kursus = '$id_kursus', jumlah_jual = $jumlah_jual[$i], harga_jual = $harga_jual";
                $result = mysqli_query($conn, $query);

                // Query update stok barang
                $query = "UPDATE kursus SET kapasitas_kursus = ($kapasitas_kursus[$i] - $jumlah_jual[$i]) WHERE id_kursus = '$id_kursus'";
                $result = mysqli_query($conn, $query);
            } else {
                break;
            }
            $i = $i + 1;
        }
        $_SESSION['id_transaksi'] = $id_transaksi;
    }

    if (min($kapasitas_kursus) != 0) {
        header('location:invoice.php');
    } else {
        header('location:displayAllData.php');
        session_destroy();
    }
}
?>