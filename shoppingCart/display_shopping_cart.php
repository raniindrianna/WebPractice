<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="./cssWeb.css">
</head>

<body>
    <h2 class="row justify-content-center">Shopping Cart</h2>
    <table border="1" class="table table-striped table-bordered border-dark table-color">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Quantity</th>
                <th>Harga Barang</th>
                <th>Sub Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            <?php $total = 0; ?>
            <?php if (isset($_SESSION['nama_barang'])) : ?>
                <?php while ($i < count($_SESSION['nama_barang'])) : ?>
                    <tr>
                        <td><?= $_SESSION['nama_barang'][$i] ?></td>
                        <td>
                            <?= $_SESSION['quantity'][$i] ?>
                        </td>
                        <td><?= $_SESSION['harga'][$i] ?></td>
                        <td><?= $_SESSION['quantity'][$i] * $_SESSION['harga'][$i] ?></td>
                        <?php $total = $total + ($_SESSION['quantity'][$i] * $_SESSION['harga'][$i]) ?>

                        <?php $_SESSION['total'] = $total; ?>
                    </tr>
                    <?php $i = $i + 1; ?>
                <?php endwhile; ?>
            <?php else : ?>
                <tr>
                    <td colspan=4>Shopping Cart Kosong</td>
                </tr>
            <?php endif; ?>
            <tr>
                <td colspan="3">Total Harga</td>
                <td><?= $total ?></td>
            </tr>
        </tbody>
    </table>
    <a class="btnBack" href="template.php"><button type="button" class="btn btn-primary">BACK</button></a>
    <a class="btnBack" href="delete.php"><button type="button" class="btn btn-danger">DELETE ALL LIST</button></a>
</body>

</html>