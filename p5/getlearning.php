<?php
$mahasiswa = [
    ["nama" =>"kiki",
    "nim" => "32167799",
    "prodi"=>"teknik informatika",
    "gambar" => "teuku.jpeg"
],
     
    ["nama" =>"jigong",
    "nim" => "00998800",
    "prodi"=>"teknik informatika",
    "gambar" => "2.jpg"
    ] 
]
?>

<!-- var_dump dan print_r untuk melihat debugging -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>

</head>

<body>

    <p>Daftar Mahasiswa</p>
    <ul>
        <?php foreach($mahasiswa as $mhs) : ?>


        <li>
            <a href="getlearning2.php?nama=<?= $mhs["nama"]; ?>
                    &nim= <?= $mhs["nim"];?> 
                       &prodi= <?= $mhs["prodi"];?>
                        &gambar= <?= $mhs["gambar"];?>"></a>
        </li>
        <?php endforeach; ?>
    </ul>



</body>

</html>