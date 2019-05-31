<?php

if ((!isset($argv[1]) && empty($argv[1])) && (!isset($argv[2]) && empty($argv[2]))) {
    echo 'You need to set the Values!' . PHP_EOL;
    exit();
}

$value1 = $argv[1];
$value2 = $argv[2];
$dateFormmat = 'd.m.Y';


try {
    $dateOne = new Datetime($value1);
    $dateOne->format($dateFormmat);
} catch (Exception $e) {
    echo $e->getTraceAsString();
    exit();
}

try {
    $dateTwo = new DateTime($value2);
    $dateTwo->format($dateFormmat);
} catch (Exception $e) {
    echo $e->getTraceAsString();
    exit();
}

$diff = $dateOne->diff($dateTwo);

echo 'Differnece of days between ' . $value1 . ' and ' . $value2 . ' is ' . $diff->days . ' days ' . PHP_EOL;