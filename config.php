<?php
session_start();

// Данные сайта (редактируются через админку)
$dataFile = __DIR__ . '/data/site.json';

function loadSiteData() {
    global $dataFile;
    if (file_exists($dataFile)) {
        return json_decode(file_get_contents($dataFile), true) ?: getDefaultData();
    }
    return getDefaultData();
}

function saveSiteData($data) {
    global $dataFile;
    $dir = dirname($dataFile);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function getDefaultData() {
    return [
        'greeting' => 'Привет, Sasha!',
        'subtitle' => 'Это простой сайт на PHP.'
    ];
}

// Админ: логин admin, пароль admin (смени в проде!)
function checkAuth($login, $password) {
    return $login === 'admin' && $password === 'admin';
}

function isLoggedIn() {
    return !empty($_SESSION['admin']);
}

function requireAuth() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}
