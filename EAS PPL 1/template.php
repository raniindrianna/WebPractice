<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <center>
        <h2>KURSUS IT & ENGLISH </h2>
    </center>
</head>

<body>

    </class>

    <div class="row">

        <td class="border border-2 border-dark">

        </td>

        <?php
        include "connection.php";
        $result = mysqli_query($conn, "SELECT * FROM kursus");
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="col-md-3 text ">
                <div class="card" style="width:18reml; margin-top:20px; margin-left:20px; padding: 20px ;">
                    <img src="Foto/<?php echo $row['image'] ?>" class="card-img-top" alt="null" width="300" height="200">
                    <div class="card-body"></div>

                    <h5 class="card-title"><?php echo $row['nama_kursus'] ?></h5>
                    <h6 class="card-harga">Rp. <?php echo $row['harga_kursus'] ?></h6>
                    <p class="card-kapasitas">Stok : <?php echo $row['kapasitas_kursus'] ?></p>
                    <a href="addCartCourse.php?id=<?php echo $row['id_kursus'] ?>" class="btn btn-success">ADD TO CART</a>
                    <!-- <a href="template.php?content=display_shopping_cart.php">SHOPPING CART</a> -->

                </div>

            </div>


        <?php
        }
        ?>
    </div>
</body>

</html>