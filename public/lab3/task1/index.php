<?php
    if(isset($_POST['delete_cookie'])){
        setcookie('username', '', time() - 3600);
        exit;
    }


    if(isset($_POST['username'])){
        $username = $_POST['username'];
        setcookie('username', $username, time() + (86400 * 7));
        exit;
    }

    $username = $_COOKIE['username'] ?? '';
?>

<html>
    <body>
        <?php if($username): ?>
            <h2>Привіт, <?=$username?>! </h2>
            <form method="post">
                <button type="submit" name="delete_cookie">Видалити куку</button>
            </form>
        <?php else: ?>
            <form method="post">
                <label for="username">Введіть ваше імʼя:</label>
                <input type="text" name="username" id="username" required>
                <button type="submit">Зберегти</button>
            </form>
        <?php endif; ?>
    </body>
</html>