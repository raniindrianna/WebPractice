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
    header("Content-Disposition: attachment; filename=Data Siswa.xls");
    ?>


    <table border="1">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>UMUR</th>
        </tr>
        <?php
        // koneksi database
        $koneksi = mysqli_connect("localhost", "root", "", "db_akademis");

        // menampilkan data pegawai
        $data = mysqli_query($koneksi, "select * from mahasiswa");
        $no = 1;
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nim']; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['umur']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>