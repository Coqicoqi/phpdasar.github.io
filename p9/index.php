<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;
}

require 'functions.php'; // memanggil functions (include juga bisa)

// paginationnnn
// konfigurasi
$jumlahDataPerhalaman = 3;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;


$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerhalaman");

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
<!-- logika logout -->
<a href="logout.php">logout</a>
<h1>Daftar Mahasiswa</h1>
<a href="tambah.php">tambah data mahasiswa</a>
<br><br>
<!-- logika cari -->
<form action="" method="post">
    <input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword pencarian" autocomplete="off"
        id="keyword">
    <button type="submit" name="cari" id="tombol-cari">Cari</button>
    <br><br>
</form>

<!-- navigasi -->
<?php if( $halamanAktif > 1 ) : ?>
<a href="?halaman=<?= $halamanAktif - 1; ?>">&lt</a>
<?php endif; ?>


<?php for( $i = 1; $i <= $jumlahDataPerhalaman; $i++ ) : ?>
<?php if( $i == $halamanAktif ) : ?>
<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: blue;"><?= $i; ?></a>
<?php else : ?>
<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
<?php endif; ?>
<?php endfor; ?>

<?php if( $halamanAktif > $jumlahHalaman ) : ?>
<a href="?halaman=<?= $halamanAktif + 1; ?>">&gt</a>
<?php endif; ?>


<div id="container">
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
</div>
<script src="js/script.js"></script>

</body>

</html>