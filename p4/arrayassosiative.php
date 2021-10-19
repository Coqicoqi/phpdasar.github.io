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
];
?>

<!-- var_dump dan print_r untuk melihat debugging -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
   
</head>
<body>
   
        <p>Daftar Mahasiswa</p>
        <?php foreach($mahasiswa as $mhs) : ?>
           <ul>
               <li>
                   <img src="img/<?= $mhs["gambar"]; ?>">
               </li>
               <li>Nama : <?= $mhs["nama"]?></li>
               <li>NIM  : <?= $mhs["nim"]?></li>
               <li>Prodi: <?= $mhs["prodi"]?></li>
           </ul>
            <?php endforeach; ?>

        
</body>
</html>