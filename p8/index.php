<?php

require 'functions.php'; // memanggil functions (include juga bisa)
$mahasiswa = query("SELECT * FROM mahasiswa");

//logic tombol cari
if ( isset($_POST["cari"])){
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <a href="tambah.php">tambah data mahasiswa</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword pencarian"
            autocomplete="off">
        <button type="submit" name="cari">Cari</button>
        <br><br>
    </form>


    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Prodi</th>
        </tr>

        <?php $i = 1; ?>
        <?Php foreach($mahasiswa as $a) :?>
        <tr>
            <td><?= $a["id"]; ?></td>
            <td>
                <a href="ubah.php?id=<?= $a["id"]; ?>" onclick="return confirm('yakinkah anda');">ubah</a>
                <a href="hapus.php?id=<?= $a["id"]; ?>" onclick="return confirm('yakinkah anda');">hapus</a>
            </td>
            <td><img src="img/<?php echo $a["gambar"]; ?>" alt="" width=" 50"></td>
            <td><?php echo $a["nama"]; ?></td>
            <td><?php echo $a["nim"]; ?></td>
            <td><?php echo $a["prodi"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>




    </table>


</body>

</html>