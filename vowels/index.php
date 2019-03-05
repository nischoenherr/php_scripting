<?php

function isVowel($characters) // function to define vowels
{
    $characters = strtoupper($characters);
    return ($characters == 'A' || $characters == 'E' ||
        $characters == 'I' || $characters == 'O' ||
        $characters == 'U');
}

function countVowels($str) // function to count the vowels
{
    $count = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if (isVowel($str[$i])) {
            ++$count;
        }
    }
    return $count;
}


// Create new Colors class
$colors = new Color();

// if isset is used to check the script after values
if (isset($argv[1])) {
    $string = $argv[1];
}

// Error check
if (empty($string)) {
    echo $colors->getColoredString("You need to enter a String!", "red") . PHP_EOL;
    exit();
}

// If the User will enter a number
if (is_numeric($string)) {
    echo $colors->getColoredString("Numbers are not allowed!", "red") . PHP_EOL;
    exit();
}

// total numbers of vowel
echo $colors->getColoredString(countVowels($string), "green") . PHP_EOL;


class Color // Color class
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
