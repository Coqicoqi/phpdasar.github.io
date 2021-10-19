<?php
$angka = [[3,2,15],[20,11,77],[89,22,73,75]];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
    <style>
        .kotak {
            width: 50px;
            height: 50px;
            background-color: blue;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;
            transition: 1s;
        }

        .kotak:hover {
            transform: rotate(360deg);
            border-radius: 50%;
        }

        .clear { clear: both;}
    </style>
</head>
<body>
    <?php for($i=0; $i < count($angka); $i++) { ?>
        <div class="kotak"><?php echo $angka[$i] ?></div>
        <?php } echo"<br>";  ?>

        <div class="clear"></div>

    <?php foreach($angka as $a) { ?>
        <div class="kotak"><?php echo $a; ?></div>
        <?php } ?>

        <div class="clear"></div>

        <?php foreach($angka as $a) : ?>
            <?php foreach($a as $b) : ?>
            <div class="kotak"><?= $b; ?></div>
            <?php endforeach; ?>
            <div class="clear"></div>
            <?php endforeach; ?>

            
</body>
</html>