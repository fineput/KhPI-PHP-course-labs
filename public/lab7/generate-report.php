<?php
$cacheFile = "cache/report.html";
$cacheTime = 600;

if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheTime)) {
    echo "<h3>Завантажено з кешу</h3>";
    echo file_get_contents($cacheFile);
    exit;
}

sleep(3);

$report = "<h3>Новий звіт (згенеровано)</h3>";
$report .= "<table border='1' cellpadding='5'>";

for ($i = 0; $i < 1000; $i++) {
    $report .= "<tr>
        <td>Запис №$i</td>
        <td>" . rand(100, 999) . "</td>
        <td>" . date('Y-m-d') . "</td>
    </tr>";
}
$report .= "</table>";

file_put_contents($cacheFile, $report);

echo $report;
