<?php
require_once __DIR__ . '/../config.php';
requireAuth();

$data = loadSiteData();
$saved = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data['greeting'] = trim($_POST['greeting'] ?? '');
    $data['subtitle'] = trim($_POST['subtitle'] ?? '');
    saveSiteData($data);
    $saved = true;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: system-ui, sans-serif; max-width: 600px; margin: 40px auto; padding: 20px; }
        h1 { font-size: 1.5rem; margin-bottom: 24px; }
        label { display: block; margin-bottom: 6px; font-weight: 500; }
        input, textarea { width: 100%; padding: 10px 12px; margin-bottom: 16px; font-size: 16px; border: 1px solid #ccc; border-radius: 6px; }
        textarea { min-height: 80px; resize: vertical; }
        button { padding: 10px 20px; background: #2563eb; color: white; border: none; border-radius: 6px; font-size: 16px; cursor: pointer; }
        button:hover { background: #1d4ed8; }
        .success { color: #16a34a; margin-bottom: 16px; }
        .logout { display: inline-block; margin-top: 20px; color: #64748b; font-size: 14px; text-decoration: none; }
        .logout:hover { color: #1e293b; }
    </style>
</head>
<body>
    <h1>Админ-панель</h1>
    <?php if ($saved): ?><p class="success">Изменения сохранены!</p><?php endif; ?>
    
    <form method="POST">
        <label>Приветствие</label>
        <input type="text" name="greeting" value="<?= htmlspecialchars($data['greeting']) ?>" placeholder="Привет, мир!">
        
        <label>Подзаголовок</label>
        <input type="text" name="subtitle" value="<?= htmlspecialchars($data['subtitle']) ?>" placeholder="Описание сайта">
        
        <button type="submit">Сохранить</button>
    </form>
    
    <a href="logout.php" class="logout">Выйти</a>
</body>
</html>
