<?php
require_once 'config.php';


$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';


if (!$username || !$password) {
die('Всі поля обов\'язкові. <a href="login.html">Повернутися</a>');
}


$stmt = $mysqli->prepare('SELECT id, password FROM users WHERE username = ? LIMIT 1');
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows === 0) {
$stmt->close();
die('Користувача не знайдено. <a href="login.html">Повернутися</a>');
}
$stmt->bind_result($id, $hash);
$stmt->fetch();
$stmt->close();


if (password_verify($password, $hash)) {
session_regenerate_id(true);
$_SESSION['user_id'] = $id;
$_SESSION['username'] = $username;
header('Location: welcome.php');
exit;
} else {
die('Невірний пароль. <a href="login.html">Повернутися</a>');
}