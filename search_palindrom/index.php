<?php

$string = ''; // empty string variable

if (isset($argv[1])) {
    $string = $argv[1];
}

// Error check
if (empty($string)) {
    echo 'No String' . PHP_EOL;
    exit();
}


// Check if entered length is correct
$length = strlen($string);

if (3 > $length) { // if length is small then 3 give out the echo and exit the Script
    echo 'Correct length' . PHP_EOL;
    exit();
}

$checkstr = str_replace(' ', '', $string); // replace all spaces
$checkstr = strtolower($checkstr); // make string lowercase
$checkstr = strrev($checkstr); // will turn the string

if ($checkstr === $string){ // check the string and give it out
    echo 'Palindrome found' . PHP_EOL;
} else {
    echo 'Palindrome not found' . PHP_EOL;
}
exit();