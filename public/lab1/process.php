<?php
$name = $_POST['name'] ?? '';
$last_name = $_POST['last_name'] ?? '';

if(empty($name) || empty($last_name)){
    echo "Будь ласка, заповніть всі поля форми!";
    exit;
}

if(!is_string($name) || !is_string($last_name)){
    echo "Неправильний формат даних!";
    exit;
}

echo "<h2>Привіт, $name $last_name!</h2>";
?>