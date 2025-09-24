<?php
$dir = "uploads";

if(is_dir($dir)){
    if($dh = opendir($dir)){
        echo "<ul>";

        while(($file = readdir($dh)) !== false){
            if($file != "." && $file != ".."){
                $filePath = $dir . "/" . $file;

                echo "<li><a href='$filePath' download>$file</a></li>";
            }
        }
        echo "</ul>";
        closedir($dh);
    }
} else {
    echo "Директорія '$dir' не знайдена!";
}
?>