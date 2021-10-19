<?php 
if ( !isset ($_GET["nama"]) || 
!isset ($_GET["nim"]) || 
!isset ($_GET["prodi"]) ||
!isset ($_GET["gambar"])) {
//redirect
header("location: getlearning.php");
exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <li><img src="img/<?= $_GET["gambar"] ?>"></li>
        <li><?= $_GET["nama"] ?></li>
        <li><?= $_GET["nim"] ?></li>
        <li><?= $_GET["prodi"] ?></li>


    </ul>
    <a href="getlearning.php">kembali</a>
</body>

</html>