<?php // відкриваючий тег, який вказує, що далі іде php код
//task 1
echo "Hello world!"; // команда echo виводить на екран текст


// task 2
$a = 'Yarik';
$b = 10;
$c = 10.14;
$x = true;
echo $a, $b, $c, $x;

//task 3
$first_string = 'Yaroslav ';
$second_string = 'Olefirenko';
echo $first_string . $second_string;

//task 4
$num = 5;
if($num % 2 == 0){
    echo 'Парне число';
} else {
    echo 'не парне число';
}

//task 5
for($i = 1; $i <= 10; $i++){
    echo $i;
}

$num_while = 10;
while ($num_while >= 1){
    echo $num_while;
    $num_while--;
}

//task 6
$student = [
    "name" => "Yarik",
    "last_name" => "Olefirenko",
    "age" => "19",
    "specialty" => "122"
];

echo $student["name"];
echo $student["last_name"];
echo $student["age"];
echo $student["specialty"];

$student["avarege"] = "87";

foreach($student as $key => $value){
    echo "$key : $value <br>";
}

?>