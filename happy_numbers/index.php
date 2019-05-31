<?php

$draw = new Drawing();

// Error handling if the User did not enter something
if (!isset($argv[1]) && empty($argv[1])){
    echo $draw->getColoredString('You need to enter a number!', 'light_red' ). PHP_EOL;
    exit();
}

$string = $argv[1];

// If the User want put in a number
if (!is_numeric($string) && !is_int($string)){
    echo $draw->getColoredString('Only numbers are allowed!', 'light_red' ). PHP_EOL;
    exit();
}

$happynumber = 0;

for ($j = 0; $j < 4; ++$j){
    for ($i = 0; $i < strlen($string); ++$i){
        $happynumber += $string[$i] ** 2;
    }

    $string = (string)$happynumber;
    $happynumber = 0;
}

echo $draw->getColoredString('Happy number of ' . $argv[1] . ' is ' . $string, 'green') . PHP_EOL;


// Coloring
class Drawing // Color class
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
