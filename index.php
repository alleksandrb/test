<?php
require_once __DIR__ . '/config.php';

$data = loadSiteData();
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
    <h1><?= htmlspecialchars($data['greeting']) ?></h1>
    <p><?= htmlspecialchars($data['subtitle']) ?> Сейчас: <?= $date ?></p>
</body>
</html>
