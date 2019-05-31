<!--Html block-->
<html>
<head>
    <link rel="icon" type="image/vnd.microsoft.icon" href="php.ico">
    <style>
        #wrapper {
            width: 500px;
            margin-right: auto;
            margin-left: auto;
        }

        body {
            font-family: sans-serif;
            background-image: url("abstract.png");
            padding: 5px 15px;
        }
    </style>

    <title> Lines, Characters and Words </title>
</head>
<div id="wrapper">

    <h1><u><i> Lines, Characters and Words </i></u></h1>


    <!-- Count of Lines in txt. Data-->
    <?php

    function getLines($file) // Function implements a generator to read out the lines
    {
        $f = fopen($file, 'r'); // Open the File.


        while ($line = fgets($f)) { // Read lines without getting on the Memory
            yield $line;
        }
    }

    $file = 'archive.org.txt';
    $lineCount = iterator_count(getLines($file)); // Count Lines
    echo "<p><b><font color='#0000FF'> - This file has " . $lineCount . " lines. </p></b></font>"; // output

    ?>


    <!-- Count of words in txt. Data-->
    <?php

    $read = "archive.org.txt";
    $str = file_get_contents($read); // Convert content of Data to String.
    $numWords = str_word_count($str); // Count words of String.
    echo "<p><b><font color='#088A29'> - This file has " . $numWords . " words. </font></b></p>"; // output
    ?>


    <!-- Count of characters-->
<?php

$path = "archive.org.txt"; // Data path
$file = file_get_contents($path); // Convert content to String
$count = preg_match_all("//", $file, $matches); // Searched the Data of matches.
echo "<b><p><font color='#8b0000'> - This file has " . $count . " characters. </font></b></p>"; // output

?>