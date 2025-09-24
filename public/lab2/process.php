<?php

if (isset($_FILES['user_file'])) {
    $uploadDir = __DIR__ . "/uploads/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $file = $_FILES['user_file'];

    if (is_uploaded_file($file['tmp_name'])) {
        if(getimagesize($file['tmp_name']) and $file['size'] <=2 * 1024 * 1024){
            if (move_uploaded_file($file['tmp_name'], $uploadDir . $file['name'])) {
                $isReapitName = $uploadDir . $file['name'];
                $newName =  $file['name'] . " (копія)";
                if(file_exists($isReapitName)){
                    echo "Файл з такою назвою уже існує, тепер файл має назву - {$newName}";
                } else {
                    echo "Файл успішно збережено!";
                }

                $typeFile = $file['type'];
                $sizeFile = $file['size'] / 1024;

                echo "<br>Ім`я файлу: {$newName}";
                echo "<br>Тип файлу: {$typeFile}";
                echo "<br>Розмір файлу: {$sizeFile} Кб";

                
            } else {
            echo "Помилка при збереженні файлу.";
            }

        } else {
            echo "Дозволені тільки зображення (png, jpg, jpeg) до 2 МБ.";
        }
        
    } else {
        echo "Файл не був завантажений";
    }
}
 