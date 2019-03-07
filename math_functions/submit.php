<?php

require_once 'Calculation.php';

// Translation: Wenn $_POST und submit gesetzt sind, und der Post leer ist, schicke den User auf die Seite zurück und gebe 'message' aus.
if (isset($_POST) && isset($_POST['submit']) && empty($_POST['z1'])) {
    header('Location: index.php?message=invalidInput');
    exit();
}

// Translation: Wenn der Post nicht numerisch ist, dann gebe 'message' aus.
if (!is_numeric($_POST['z1'])) {
    header('Location: index.php?message=invalidCharacters');
    exit();
}

// create Object
$taskoneresult = new Calculation();
$tabledata = $taskoneresult->calculate_results($_POST['z1']);

// output by User-Input
$returnString = '?factorial=' . $tabledata['Factorial'] . '&exponential=' . $tabledata['Exponential'] . '&fibonacci=' . $tabledata['Fibonacci']
. '&pi=' . $tabledata['Pi'];

// output Location
header('Location:index.php' . $returnString);
exit();