<?php
require_once "Product.php";
require_once "DiscountedProduct.php";
require_once "Category.php";

try {
    // Створення товарів
    $laptop = new Product("Ноутбук Lenovo", 25000, "Міцний та швидкий ноутбук для роботи.");
    $phone = new DiscountedProduct("Смартфон Samsung", 18000, "Флагман з потужною камерою.", 15);
    $headphones = new DiscountedProduct("Навушники Sony", 5000, "Безпровідні навушники з шумопоглинанням.", 10);

    // Створення категорій
    $electronics = new Category("Електроніка");
    $accessories = new Category("Аксесуари");

    // Додавання товарів у категорії
    $electronics->addProduct($laptop);
    $electronics->addProduct($phone);
    $accessories->addProduct($headphones);

    // Вивід усіх товарів
    $electronics->showProducts();
    $accessories->showProducts();
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage();
}
?>
