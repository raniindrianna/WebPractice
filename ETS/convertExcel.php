<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>

    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data penilaian Mahasiswa.xls");
    ?>


    <table border="1">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>TGS</th>
        </tr>
        <?php
        // koneksi database
        $koneksi = mysqli_connect("localhost", "root", "", "db_nilai");

        // menampilkan data
        $data = mysqli_query($koneksi, "select * from penilaian");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $d['Nim']; ?></td>
                <td><?php echo $d['Nama']; ?></td>
                <td><?php echo $d['UTS']; ?></td>
                <td><?php echo $d['UAS']; ?></td>
                <td><?php echo $d['TGS']; ?></td>
                <td><?php echo $d['NilaiFinal']; ?></td>
                <td><?php echo $d['pict']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>