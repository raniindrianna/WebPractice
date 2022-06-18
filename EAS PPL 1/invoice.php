<?php
include "connection.php";
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</head>

<style type="text/css">
    /* ini buat thead **/
    .table-striped>thead>tr:nth-child(odd)>td,
    .table-striped>thead>tr:nth-child(odd)>th {
        background-color: #0e1111;
    }

    .table-striped>thead>tr:nth-child(even)>td,
    .table-striped>thead>tr:nth-child(even)>th {
        background-color: #0e1111;
    }

    /* ini buat tbody **/
    .table-striped>tbody>tr:nth-child(odd)>td,
    .table-striped>tbody>tr:nth-child(odd)>th {
        background-color: #313131;
    }

    .table-striped>tbody>tr:nth-child(even)>td,
    .table-striped>tbody>tr:nth-child(even)>th {
        background-color: #414141;
    }
</style>

<body>
    <div class="container">
        <center>
            <h1 class="display-7 fst-italic"> INVOICE </h1>
        </center>
        <?php
        $result3 = $conn->query("SELECT * FROM transaksi WHERE id_transaksi = '" . $_SESSION['id_transaksi'] . "'");
        $row3 = $result3->fetch_assoc();
        ?>
        <table class="table table-bordered table-striped table-rounded">
            <thead>
                <tr align=center class="text-white">
                    <th colspan="3">
                        <center>
                            <h1 class="display-6"> Data Pembeli </h1>
                        </center>
                    </th>
                </tr>
            </thead>
            <tbody align=left class="text-white">
                <tr class="text-white">
                    <td>Nama Pembeli</td>
                    <td><?= $row3['nama_pembeli']; ?></td>
                </tr>
                <tr>
                    <td>Nomer HP</td>
                    <td><?= $row3['no_hp']; ?></td>
                </tr>
                <tr class="text-white">
                    <td>Alamat</td>
                    <td><?= $row3['alamat']; ?></td>
                </tr>

            </tbody>
        </table>

        <table class="table table-bordered table-striped table-rounded">
            <thead align=center class="text-white">
                <tr>
                    <th colspan="3">
                        <center>
                            <h1 class="display-6"> Data Keranjang </h1>
                        </center>
                    </th>
                </tr>
                <tr>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Harga Barang</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM jual WHERE id_transaksi = " . $_SESSION['id_transaksi']);
                $total = 0;
                if ($result->num_rows > 0) :
                    while ($row = $result->fetch_assoc()) :
                        $result2 = $conn->query("SELECT nama_kursus FROM kursus WHERE id_kursus = '" . $row['id_kursus'] . "'");
                        $row2 = $result2->fetch_assoc();
                ?>
                        <tr align=center class="text-white">
                            <td align=left><?= $row2['nama_kursus'] ?></td>
                            <th><?= $row['jumlah_jual'] ?></th>
                            <td><?= ($row['harga_jual']) ?></td>
                            <?php
                            $total = $total + $row['jumlah_jual'] * $row['harga_jual']
                            ?>
                        </tr>
                    <?php
                    endwhile;
                    ?>
                    <tr align=center class="text-white">
                        <th colspan="2">TOTAL HARGA</th>
                        <th><?= $total ?></th>
                    </tr>
                <?php
                else :
                ?>
                    <tr>
                        <td colspan=3>Data Kosong</td>
                    </tr>
                <?php
                endif;
                ?>
            </tbody>
        </table>
        <input type='button' value='Home' class='btn btn-dark' onClick="location.href='template.php?content=display.php'">
    </div>
</body>

</html>