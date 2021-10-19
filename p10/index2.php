<?php
// koneksi
$conn = mysqli_connect("localhost", "root", "", "phpdasar2");

// ambil data
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// ambil data (fecth) dari object result
// mysql_fetch_row() = mengembalikan array numerik
// mysql_fecth_assoc() = mengembalikan array asosiatif
// mysql_fecth_array() = mengembalikan keduanya
// mysql_fecth_object() = memakai sintaks object

// while( $a =mysqli_fetch_assoc($result)) {
    // var_dump($a);
// }
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
        <?Php while( $a = mysqli_fetch_assoc($result)):?>
        <tr>
            <td><?= $a["id"]; ?></td>
            <td>
                <a href="">ubah</a>
                <a href="">hapus</a>
            </td>
            <td><img src="img/<?php echo $a["gambar"]; ?> alt="" width=" 50"></td>
            <td><?php echo $a["nama"]; ?></td>
            <td><?php echo $a["nim"]; ?></td>
            <td><?php echo $a["prodi"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endwhile; ?>




    </table>


</body>

</html>