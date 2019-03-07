<?php
// Coloring
class colored // Color class
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

$printing = new colored();

// Main
if (!isset($argv[1]) && empty($argv[1])) {
    echo $printing->getColoredString('Error! You need to enter a String!', 'red') . PHP_EOL;
    exit();
}

$string = $argv[1];

if (!is_numeric($string) && !is_int($string)) {
    echo $printing->getColoredString('Error! Argument need to be an integer!', 'red') . PHP_EOL;
    exit();
}

$result = [0 => 0, 1 => 0];

for ($i = 0; $i < $string; $i++) {
    $flip = mt_rand(0, 1);
    ++$result[$flip];
}

echo $printing->getColoredString('Heads: ' . $result[0], 'light_green') . PHP_EOL;
echo $printing->getColoredString('Numbers: ' . $result[1], 'light_red') . PHP_EOL;