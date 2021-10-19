<?php 
   require 'functions.php';
   
   
   if ( isset($_POST["register"]) ) {

    if ( registrasi($_POST) > 0 ) {

        echo "<script>
        alert('Berhasil Mendaftar');
        </script>";
    }else{
        echo mysqli_error($conn);
    }


    }


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Mahasiswa</title>
    <style>
    label {
        display: block;
    }
    </style>
</head>

<body>
    <h1>Halaman Registrasi</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="username">username </label>
                <input type="text" name="username" id="username" required>
            </li>
            <li>
                <label for="password">password </label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <label for="password2">konfirmasi password </label>
                <input type="password" name="password2" id="password2" required>
            </li>

            <li>
                <button type="submit" name="register">Register!</button>
            </li>

        </ul>

    </form>
</body>

</html>