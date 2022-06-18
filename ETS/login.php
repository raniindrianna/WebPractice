<!-- <?php

        session_start();


        $conn = mysqli_connect("localhost", "root", "", "db_nilai");
        if (isset($_POST["login"])) {
            $nim = $_POST["nim"];
            $username = $_POST["username"];
            $password = md5($_POST["password"]);

            $result = mysqli_query($conn, "SELECT * from login WHERE username='$username'");

            if (mysqli_num_rows($result) === 1) {

                $row = mysqli_fetch_assoc($result);
                if ($password == $row["password"]) {
                    $_SESSION["login"] = true;
                    echo "<script>
                        alert('LOGIN SUCCESS!');
                        document.location.href = 'template.php'; 
                </script>";

                    exit;
                }
            }
            $error = true;
        }
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <style type="text/css">
        .form-login {
            border-style: solid;
            border-color: black;
            width: 400px;
            height: 200px;
            margin-left: 450px;
            margin-top: 200px;
            padding: 10px;
        }

        #btn-login {
            background-color: blue;
            color: white;
        }
    </style>
</head>

<body>


    <div class="form-login" align="center">
        <form method="post" action="">
            <center>
                <h1 align="bottom">LOGIN</h1>
            </center>
            <?php
            if (isset($error)) :
            ?>
                <p style="color: red ; font-weight:bold;">USERNAME ATAU PASSWORD SALAH</p>
            <?php endif; ?>
            <table>

                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><input type="text" name="NIM" placeholder="masukkan NIM" autocomplete="off"></td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input type="text" name="username" placeholder="masukkan username" autocomplete="off"></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="password" name="password" placeholder="masukkan password" autocomplete="off"></td>
                </tr>

                <tr>
                    <td>
                        <p> </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="login" id="btn-login">LOGIN</button>
                    </td>
                </tr>
            </table>

        </form>
    </div>
</body>

</html> -->