<?php
$greeting = "Привет, мир!";
$date = date('d.m.Y H:i');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой PHP сайт</title>
</head>
<body>
    <h1><?php echo $greeting; ?></h1>
    <p>Это простой сайт на PHP. Сейчас: <?php echo $date; ?></p>
</body>
</html>
