<?php

// define variables
$length = 10;
$passwords = 5;
$characters = true;
$numbers = true;
$special = false;
$upperParam = true;

unset($argv[0]); // deletes the variable 0

foreach ($argv as $key => $value) { // loop

    $value = strtolower($value); // convert string to lowercase

    switch ($value) {
        case '-s':
            $special = true;
            break;
        case '-n':
            $length = $argv[++$key];
            break;
        case '-0':
            $numbers = false;
            break;
        case '-A':
            $upperParam = false;
            break;
        case '-v':
            $_validConsonant;
            $_validVocals;
    }
}

// variables with an array init
$_validCharacters = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');

$_validConsonant = array('b', 'c',  'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 'ß', 't', 'v', 'w', 'x', 'z');
$_validVocals = array('a', 'ä', 'e', 'i', 'o', 'ö', 'u', 'ü', 'y');

$_validNumbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
$_validSpecial = array('#', '-', '_', '!', '"', '$', '&', '%', ',', '<', '=', '?', '@', '[', ']', '/');

$_pool = array(); // variable with array


// Error check
if (isset($argv[1])) {
    $length = $argv[1];
}

if (isset($argv[2])) {
    $passwords = $argv[2];
}

if (isset($argv[3])) {
    $characters = (bool)$argv[3];
}

if (isset($argv[4])) {
    $numbers = (bool)$argv[4];
}

if (isset($argv[5])) {
    $special = (bool)$argv[5];
}

if (true === $characters) { // Überprüfung ob $characters true ist.
    $_pool = array_merge($_pool, $_validCharacters); // Array merge fügt ein Array an das andere.
}

if (true === $numbers) {
    $_pool = array_merge($_pool, $_validNumbers);
}

if (true === $special) {
    $_pool = array_merge($_pool, $_validSpecial);
}

// If empty
if (empty($length && $numbers && $special && $characters && $passwords)) {
    echo "Error! You need to set the Values!" . PHP_EOL;
    exit();
}

// If password is to short
switch ($length) {
    case 0:
        echo "Error! The password must have at least 1 Character!" . PHP_EOL;
        exit();
}

// If no password was entered
if ($passwords < 1) {
    echo "Error! You need to generate at least one password!" . PHP_EOL;
    exit();
}

$_poolLength = count($_pool);
--$_poolLength;

for ($j = 0; $j < $passwords; ++$j) { // loop for generating
    $newPassword = '';

    for ($i = 0; $i < $length; ++$i) { // loop for generating random number
        $key = mt_rand(0, $_poolLength);
        $upper = mt_rand(0, 1);

        $tmpCharacter = $_pool[$key];

        if (1 === $upper && true === $upperParam) { // if a letter in uppercase was entered, make String to upper.
            $tmpCharacter = strtoupper($tmpCharacter);
        }

        $newPassword .= $tmpCharacter; // generating in variable
    }

    echo $newPassword . PHP_EOL; // output
}