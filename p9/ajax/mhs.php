<?php
   require '../functions.php';
   $keyword = $_GET["keyword"];
   $query = "SELECT * FROM mahasiswa
   WHERE
   nama LIKE '%$keyword%'
   OR nim LIKE '%$keyword%'
   OR prodi LIKE'%$keyword%'
   ";
   $mahasiswa = query($query);
?>

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