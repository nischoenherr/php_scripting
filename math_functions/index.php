<html>
<head>
    <link rel="icon" type="image/vnd.microsoft.icon" href="php.ico">
    <style>
        #wrapper {
            width: 600px;
            margin-right: auto;
            margin-left: auto;
        }

        body {
            font-family: sans-serif;
            background-image: url("abstract.png");
            background-position: center;
        }

        table {
            width: 100%;
        }

        table td {
            width: 25%;
        }

        table thead td {
            background: lightgrey;
            padding: 5px 15px;
        }
    </style>

    <title> Complex Mathematical Functions </title>
</head>
<div id="wrapper">

    <h1><u><i> Complex Mathematical Functions </i></u></h1>
    <br>

    <p><font color="green"> Please give me a number and send the form.</p></font>
    <form action="./submit.php" method="post">
        <p> Value: <input name="z1"/></p>
        <p><input type="submit" name="submit" value="Send"/> <input type="reset" value="Delete"/></p>
    </form>

    <!--Catch request-->
    <?php

    // Error handling from header in 'submit.php'
    $errors = [
        'invalidInput'      => 'Please enter a number!',
        'invalidCharacters' => 'Dont use special Characters or letters!'
    ];

    // Check if the message was set in header
    if (isset($_REQUEST['message']) && isset($errors[$_REQUEST['message']])) {
        echo '<p><b>' . '<font color="red">' . $errors[$_REQUEST['message']] . '</p></b>';
    }

    $factorial = '';
    $exponential = '';
    $fibonacci = '';
    $pi = '';

    echo '<table><thead><tr>';

    if (!empty($_REQUEST['factorial'])) { // output of Factorial
        $factorial = $_REQUEST['factorial'];
        echo '<td><i><b><font color="green">' . 'Factorial: ' . $factorial . '</font></i></td>';
    }

    if (!empty($_REQUEST['exponential'])) { // output of Exponential
        $exponential = $_REQUEST['exponential'];
        echo '<td><i><b><font color="blue">' . 'Exponential: ' . $exponential . '</font></i></td>';
    }

    if (!empty($_REQUEST['fibonacci'])) { // output of Fibonacci
        $fibonacci = $_REQUEST['fibonacci'];
        echo '<td><i><b><font color="purple">' . 'Fibonacci: ' . $fibonacci . '<br></font></i></td>';
    }

    if (!empty($_REQUEST['pi'])) { // output of Pi
        $pi = $_REQUEST['pi'];
        echo '<td><i><b><font color="red">' . 'Pi: ' . $pi . '<br></font></i></td>';
    }

    ?>

    </thead>
</div>
</body>
</html>