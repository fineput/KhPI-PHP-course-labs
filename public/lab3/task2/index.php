<?php
    session_start();

    if (isset($_GET['logout'])) {
        session_unset(); // очищає всі змінні сесії
        session_destroy(); // знищує сесію
        header("Location: index.php");
        exit;
    }


    if (isset($_SESSION['username'])) {
        echo "<h2>Вітаємо, {$_SESSION['username']}!</h2>";
        echo '<a href="?logout=true">Вихід</a>';
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = $_POST['login'] ?? '';
        $password= $_POST['password'] ?? '';

        if($login === 'admin' && $password === "123"){
            $_SESSION['username'] = $login;
            header("Location: index.php");
            exit;
        } else {
            $error = "Невірний логін чи пароль";
        }
    }

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Вхід</title>
</head>
<body>
    <h2>Форма входу</h2>

    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>

    <form method="post">
        <label>Логін:</label><br>
        <input type="text" name="login" required><br><br>

        <label>Пароль:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Увійти</button>
    </form>
</body>
</html>