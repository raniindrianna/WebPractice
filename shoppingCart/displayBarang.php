<html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cart";

// Membuat koneksi database
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

$sql = 'SELECT * FROM barang';

?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <style>
        .table-striped>tbody>tr:nth-child(odd)>td,
        .table-striped>tbody>tr:nth-child(odd)>th {
            background-color: #90EE90;
        }

        .table-striped>tbody>tr:nth-child(even)>td,
        .table-striped>tbody>tr:nth-child(even)>th {
            background-color: #FFFFFF;
        }
    </style>
</head>

<body>
    <h2 class="row justify-content-center">Data Barang</h2>
    <table class="table table-striped table-bordered border-dark table-color" border="1" align="center">
        <tr>
            <td align="center">Foto</td>
            <td align="center">Nama Barang</td>
            <td align="center">Harga</td>
            <td align="center">Pilihan</td>
        </tr>

        <?php
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td align="center"><img src="fotoBarang/<?php echo $row['fotoBarang'] ?>" alt="null" width="200" height="100"></td>
                    <td> <?php echo $row['nama_barang']; ?> </td>
                    <td> <?php echo $row['harga_barang']; ?> </td>

                    <td align="center"><a href="addCart.php?id=<?php echo $row['kode_barang'] ?>" class="btn btn-primary">Add To Cart</a></td>
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