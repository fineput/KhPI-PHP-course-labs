<?php
require_once 'config.php';


if (empty($_SESSION['user_id'])) {
header('Location: login.html');
exit;
}

$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
?>
<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Ласкаво просимо</title>
</head>
<body>
    <h1>Ласкаво просимо, <?php echo $username; ?>!</h1>
    <p>Це захищена сторінка лише для авторизованих користувачів.</p>
    <p><a href="logout.php">Вийти</a></p>
</body>
</html>