<?php

require_once 'Calculation.php';
// Translation: Wenn $_POST und submit gesetzt sind, und der Post leer ist, schicke den User auf die Seite zurück und gebe 'message' aus.
if (isset($_POST) && isset($_POST['submit']) && empty($_POST['z1'])) {
    header('Location: index.php?message=invalidInput');
    exit();
}

// Translation: Wenn kein Integer gesetzt ist, dann gebe 'message' aus.
if (!is_int($_POST['z1'])) {
    header('Location: index.php?message=invalidCharacters');
    exit();
}

// create Object
$taskoneresult = new Calculation();
$tabledata = $taskoneresult->calculate_results($_REQUEST['z1']);


header('Location:index.php?result=' . json_encode($tabledata));
exit();