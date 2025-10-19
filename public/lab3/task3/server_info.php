<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: redirect_page.php');
    exit;
}

$clientIP = $_SERVER['REMOTE_ADDR'] ?? 'Невідомо';
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Невідомо';
$currentScript = $_SERVER['PHP_SELF'] ?? 'Невідомо';
$requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'Невідомо';
$filePath = __FILE__;
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Інформація про сервер</title>
</head>
<body>
    <h2>Інформація про сервер та запит</h2>

    <ul>
        <li><strong>IP-адреса клієнта:</strong> <?= htmlspecialchars($clientIP) ?></li>
        <li><strong>Браузер:</strong> <?= htmlspecialchars($userAgent) ?></li>
        <li><strong>Назва скрипта:</strong> <?= htmlspecialchars($currentScript) ?></li>
        <li><strong>Метод запиту:</strong> <?= htmlspecialchars($requestMethod) ?></li>
        <li><strong>Шлях до файлу на сервері:</strong> <?= htmlspecialchars($filePath) ?></li>
    </ul>
</body>
</html>
