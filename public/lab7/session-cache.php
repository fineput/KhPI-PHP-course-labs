<?php
session_start();

if (!isset($_SESSION['cached_data'])) {
    sleep(2);

    $_SESSION['cached_data'] = [
        "USD" => rand(38, 40),
        "EUR" => rand(41, 44),
        "BTC" => rand(1500000, 2000000),
        "time" => date("H:i:s"),
    ];

    echo "<strong>Дані згенеровано (без кешу)</strong><br>";
} else {
    echo "<strong>Дані з сесійного кешу</strong><br>";
}

echo "<pre>";
print_r($_SESSION['cached_data']);
echo "</pre>";
