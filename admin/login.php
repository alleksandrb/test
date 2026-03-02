<?php
require_once __DIR__ . '/../config.php';

if (isLoggedIn()) {
    header('Location: index.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (checkAuth($login, $password)) {
        $_SESSION['admin'] = true;
        header('Location: index.php');
        exit;
    }
    $error = 'Неверный логин или пароль';
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в админку</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: system-ui, sans-serif; max-width: 400px; margin: 60px auto; padding: 20px; }
        h1 { font-size: 1.5rem; margin-bottom: 24px; }
        label { display: block; margin-bottom: 6px; font-weight: 500; }
        input { width: 100%; padding: 10px 12px; margin-bottom: 16px; font-size: 16px; border: 1px solid #ccc; border-radius: 6px; }
        button { width: 100%; padding: 12px; background: #2563eb; color: white; border: none; border-radius: 6px; font-size: 16px; cursor: pointer; }
        button:hover { background: #1d4ed8; }
        .error { color: #dc2626; margin-bottom: 16px; font-size: 14px; }
    </style>
</head>
<body>
    <h1>Вход в админ-панель</h1>
    <?php if ($error): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
    <form method="POST">
        <label>Логин</label>
        <input type="text" name="login" required autofocus value="<?= htmlspecialchars($_POST['login'] ?? '') ?>">
        <label>Пароль</label>
        <input type="password" name="password" required>
        <button type="submit">Войти</button>
    </form>
</body>
</html>
