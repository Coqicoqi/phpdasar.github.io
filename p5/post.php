<?php

            if ( isset($_POST["submit"]) ) {

            if ( $_POST["nama"] == "Rasa" && $_POST["kode"] == "123"){


                header("location: post2.php");
                exit;
            }else{
                $error = true;
            }

            }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php if( isset($error)) : ?>
    <p style="color: crimson; font-style: italic;">nama / password salah</p>
    <?php endif ?>





    <ul>
        <form action="" method="post">
            <li>
                <label for="nama">Masukkan Nama :</label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="kode">Password :</label>
                <input type="password" name="kode" id="kode">
                <br>
                <button type="submit" name="submit">Login</button>
            </li>

        </form>
    </ul>
</body>

</html>