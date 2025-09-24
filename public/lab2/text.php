<?php

$filename = "log.txt";

$text = "Привіт! Це запис у файл.\n";

file_put_contents($filename, $text);

$content = file_get_contents($filename);
echo $content;

?>
