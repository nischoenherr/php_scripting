<?php

class translation // Base class
{

    private $userchoice = 0; // private attribute


    function to_roman($roman) // First Method to translate Arabic to Roman
    {
        // Catch error if the User will put in a Roman number
        if (preg_match('/^(?=[MDCLXVI])M*(C[MD]|D?C{0,3})(X[CL]|L?X{0,3})(I[XV]|V?I{0,3})$/', $roman)) {
            die ("<b><font color='red'>You already entered a Roman number!<b>");
        }
        if (!is_numeric($roman)) { // Catch error if no number was given
            die ("<b><font color='red'>You may not enter letters or special characters!<b>");
        }

        // Array for the definition of Roman values
        $map = array(
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1
        );
        $returnValue = '';
        while ($roman > 0) { // loop.
            foreach ($map as $position => $int) {
                if ($roman >= $int) {
                    $roman -= $int;
                    $returnValue .= $position;
                    break;
                }
            }
        }
        return "You entered the Roman number <b><font color='green'>" . $returnValue . "</font></b>"; // output
    }


    function to_arabic($arabic) // Second Method to translate Roman to Arabic
    {
        $arabicinteger = array(
            'I' => 1, // Array for the definition of arabic numbers
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000
        );

        $result = 0;
        if ($arabic == '') {
            return $result;
        } // If $arabic is a String, then put out $result

        if (is_numeric($arabic)) { // Catch error if the User will put in a arabic number
            die ("<b><font color='red'>You already entered a arabic number <b>");
        }
        if (
        !preg_match('/^(?=[MDCLXVI])M*(C[MD]|D?C{0,3})(X[CL]|L?X{0,3})(I[XV]|V?I{0,3})$/', $arabic)) { // Error handling
            die ("<b><font color='red'>You may not enter letters or special characters!<b>");
        }

        for ($i = 0; $i < strlen($arabic); $i++) { // loop for counting up the values of arabic numbers
            $result = (($i + 1) < strlen($arabic) and
                $arabicinteger[$arabic[$i]] < $arabicinteger[$arabic[$i + 1]]) ? ($result - $arabicinteger[$arabic[$i]])
                : ($result + $arabicinteger[$arabic[$i]]);
        }

        return "You entered the Arabic number <b><font color='green'>" . $result . "</b></font>"; // output
    }


    function calculate_translations($userchoice, $targetlanguage) // Method to print the results
    {
        $result = array();

        if ($targetlanguage == 'toroman') {
            $result['Roman'] = $this->to_roman($userchoice);
        }
        else if ($targetlanguage == 'toarabic') {
            $result['Arabic'] = $this->to_arabic($userchoice);
        }
        return $result;
    }
}

?>


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
        }

        table {
            width: 100%;
        }

        table td {
            width: 25%;
        }

        table thead td {
            background: lightgrey;
            padding: 5px 5px;
        }

        table tbody td {
            border: 1px solid black;
            padding: 15px;
        }
    </style>

    <title> To Roman / To Arabic </title>
</head>
<div id="wrapper">

    <h1><u><i> To Roman / To Arabic </i></u></h1>
    <br>

    <p><font color="green"><b><i> Please give me a number to translate: </i></b></p></font>
    <form action="./index.php" method="post">
        <p> Input: <input name="b1"></p>
        <p> To Roman: <input type="radio" name="b2" value="toroman" checked></p>
        <p> To Arabic: <input type="radio" name="b2" value="toarabic"></p>
        <p><input type="submit" value="Bestätigen"/> <input type="reset" value="Zurücksetzen"/></p>
    </form>


    <!--Catch Requests-->
    <?php

    $tabletranslation = array();
    $choice_value = 0;

    if (!empty($_REQUEST["b1"])) { // Check if the User has given a number


        // Build Objects
        $translateresult = new translation();
        $tabletranslation = $translateresult->calculate_translations($_REQUEST['b1'], $_REQUEST['b2']);

        ?>


        <!--Structure of table -->
        <table>
            <thead>
            <tr>
                <?php foreach ($tabletranslation as $key => $value) {
                    echo '<td>' . $key . '</td>';
                } ?>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php foreach ($tabletranslation as $key => $value) {
                    echo '<td>' . $value . '</td>';
                } ?>
            </tr>
            </tbody>
        </table>


        <?php

    }
    else {
        echo '<b><font color = "red">' . 'You need to enter a number! </b></font>'; // Ausgabe bei absenden von leerem Formular.
    }

    ?>

</div>
</body>
</html>