<?php

// Create new Colors class
$colors = new Coloring();

class Coloring // Color class
{
    private $foreground_colors = array();

    public function __construct()
    {
        // Set up shell colors
        $this->foreground_colors['green'] = '0;32';
        $this->foreground_colors['light_green'] = '1;32';
        $this->foreground_colors['red'] = '0;31';
        $this->foreground_colors['light_red'] = '1;31';
    }

    // Returns colored string
    public function getColoredString($string, $foreground_color = null)
    {
        $colored_string = "";

        // Check if given foreground color found
        if (isset($this->foreground_colors[$foreground_color])) {
            $colored_string .= "\033[" . $this->foreground_colors[$foreground_color] . "m";
        }

        // Add string and end coloring
        $colored_string .= $string . "\033[0m";

        return $colored_string;
    }

    // Returns all foreground color names
    public function getForegroundColors()
    {
        return array_keys($this->foreground_colors);
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// main programm

$string = ''; // empty string variable

// if isset
if (isset($argv[1])) {
    $string = $argv[1];
}

// If the User entered nothing
if (empty($string)) {
    echo $colors->getColoredString('You need to enter a String!', 'red') . PHP_EOL;
    exit();
}

// If a number was entered
if (is_numeric($string)) {
    echo $colors->getColoredString('A Palindrom cant be numeric!', 'red') . PHP_EOL;
    exit();
}

// If the User will enter special characters
if (!preg_match('/^^°-!§$%&()=?+#/', $string)){
    echo $colors->getColoredString("Special Characters and Whitespaces are not allowed!", "red") . PHP_EOL;
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
