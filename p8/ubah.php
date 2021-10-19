<?php
require 'functions.php'; 
// require adalah yg menghubungkan antar folder
$id = $_GET["id"];

//query
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
//mencari [0] menggunakan var_dump , yg dimana array yang digunakan adalalah array numerik


if ( isset($_POST["submit"]) ) {

    // cek apakah data berhasil di ubah / gagal
    if ( ubah ($_POST) > 0){
       echo "
       <script>
       alert('data berhasil dirubah!');
       document.location.href = 'index.php';
       </script>
       ";
    }else{
        echo "
        <script>
        alert('data gagal dirubah!');
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
    <title>Ubah data mahasiswa</title>
    <style>
    label {
        display: block;
    }
    </style>
</head>

<body>
    <h1>Ubah data mahasiswa</h1>

    <!-- untuk menangani file enctype -->
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <input type="hidden" name="gambarlama" value="<?= $mhs["gambar"]; ?>">
        <ul>
            <li>
                <label for="nim">Nim </label>
                <input type="text" name="nim" id="nim" required value="<?= $mhs["nim"];?>">
            </li>
            <li>
                <label for=" nama">Nama </label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"];?>">
            </li>
            <li>
                <label for=" prodi">PRODI </label>
                <input type="text" name="prodi" id="prodi" required value="<?= $mhs["prodi"];?>">
            </li>
            <li>
                <label for=" gambar">Gambar </label><br>
                <img src="img/<?= $mhs ['gambar']; ?> " alt="" width="50" ;><br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type=" submit" name="submit">ubah data</button>
            </li>

        </ul>

    </form>
</body>

</html>