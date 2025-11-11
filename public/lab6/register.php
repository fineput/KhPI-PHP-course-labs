<?php
require_once 'config.php';


$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';


if (!$username || !$email || !$password) {
die('Всі поля обов\'язкові. <a href="register.html">Повернутися</a>');
}


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
die('Невірний формат email. <a href="register.html">Повернутися</a>');
}


$stmt = $mysqli->prepare('SELECT id FROM users WHERE username = ? OR email = ? LIMIT 1');
$stmt->bind_param('ss', $username, $email);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
$stmt->close();
die('Користувач з таким ім\'ям або email вже існує. <a href="register.html">Повернутися</a>');
}
$stmt->close();


$hash = password_hash($password, PASSWORD_DEFAULT);


$insert = $mysqli->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
$insert->bind_param('sss', $username, $email, $hash);
$ok = $insert->execute();
if ($ok) {
$_SESSION['user_id'] = $insert->insert_id;
$_SESSION['username'] = $username;
header('Location: welcome.php');
exit;
} else {
die('Помилка під час реєстрації. <a href="register.html">Спробувати ще</a>');
}