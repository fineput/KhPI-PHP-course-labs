<?php
session_start();

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = $_POST['product'];
    $_SESSION['cart'][] = $product;

    $old = isset($_COOKIE['old']) ? json_decode($_COOKIE['old'], true) : [];
    if (!in_array($product, $old)) $old[] = $product;
    setcookie('old', json_encode($old), time() + 86400 * 30, '/');

    header('Location: cart.php');
    exit;
}

if (isset($_GET['clear'])) {
    session_unset();
    header('Location: cart.php');
    exit;
}

//task 5
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) {
    session_unset();
    session_destroy();
    header('Location: cart.php');
    exit;
}
$_SESSION['last_activity'] = time();

$cart = $_SESSION['cart'];
$old = isset($_COOKIE['old']) ? json_decode($_COOKIE['old'], true) : [];
?>


<!DOCTYPE html>
<html lang="uk">
<head>
<meta charset="UTF-8">
<title>Корзина</title>
</head>
    <body>
        <h2>Корзина покупок</h2>
        <form method="post">
            <input type="text" name="product" placeholder="Товар" required>
            <button type="submit">Додати</button>
        </form>

        <h3>Поточна корзина</h3>
        <?php if ($cart): ?>
            <ul><?php foreach ($cart as $item): ?><li><?= htmlspecialchars($item) ?></li><?php endforeach; ?></ul>
        <?php else: ?><p>Порожньо</p><?php endif; ?>

        <h3>Попередні покупки</h3>
        <?php if ($old): ?>
        <ul><?php foreach ($old as $item): ?><li><?= htmlspecialchars($item) ?></li><?php endforeach; ?></ul>
        <?php else: ?><p>Немає</p><?php endif; ?>

        <a href="?clear=1">Очистити корзину</a>
    </body>
</html>
