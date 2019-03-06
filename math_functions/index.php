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

        table tbody td {
            border: 1px solid black;
            padding: 15px;
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
        'invalidCharacters' => 'Dont use special Characters!'
    ];

    // Check if the message was set in header
    if (isset($_REQUEST['message']) && isset($errors[$_REQUEST['message']])) {
        echo '<p><b>' . '<font color="red">' . $errors[$_REQUEST['message']] . '</p></b>';
    }

    if (!empty($_REQUEST['result'])) {

    $tabledata = array();
    $input_value = 0;

    ?>

    <!--Structure of table (creation)-->

    <table>
        <thead>
        <tr>
            <?php foreach ($tabledata as $key => $value) {
                echo '<td>' . $key . '</td>';
            } ?>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php foreach ($tabledata as $key => $value) {
                echo '<td>' . $value . '</td>';
            }
            } ?>
        </tr>
        </tbody>
    </table>

</div>
</body>
</html>