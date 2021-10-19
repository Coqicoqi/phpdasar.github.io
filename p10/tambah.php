<?php
require 'functions.php'; // require adalah yg menghubungkan antar folder
if ( isset($_POST["submit"]) ) {

    // cek apakah data berhasil di + / gagal
    if ( tambah ($_POST) > 0){
       echo "
       <script>
       alert('data berhasil ditambahkan!');
       document.location.href = 'index.php';
       </script>
       ";
    }else{
        echo "
        <script>
        alert('data gagal ditambahkan!');
        document.location.href = 'index.php';
        </script>
        ";
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data mahasiswa</title>
    <style>
    label {
        display: block;
    }
    </style>
</head>

<body>
    <h1>Tambah data mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nim">Nim </label>
                <input type="text" name="nim" id="nim" required>
            </li>
            <li>
                <label for="nama">Nama </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="prodi">PRODI </label>
                <input type="text" name="prodi" id="prodi" required>
            </li>
            <li>
                <label for="gambar">Gambar </label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">tambah data</button>
            </li>

        </ul>

    </form>
</body>

</html>