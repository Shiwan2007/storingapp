<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
$type = $_POST['type'];
$overig = $_POST['overig'];
$error = array();
if (isset($_POST['prioriteit'])) 
{
    $prioriteit = true;
}
else 
{
    $prioriteit = false;
}

echo $attractie . " / " . $capaciteit . " / " . $melder;
if (count(value: $error) == 0) {
//1. Verbinding
require_once '../../../config/conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, capaciteit, melder, type, prioriteit, overig)
VALUES(:attractie, :capaciteit, :melder, :type, :prioriteit, :overig)";


//3. Prepare
$statement = $conn->prepare(query: $query);

//4. Execute
$statement->execute(params: [
 ":attractie" => $attractie,
 ":capaciteit" => $capaciteit,
 ":melder" => $melder,
 ":type" => $type,
 ":prioriteit" => $prioriteit,  
 ":overig" => $overig,
]);

header("Location: ../../../resources/views/meldingen/index.php?msg=Melding opgeslagen");

}
else {
    var_dump(value: $error);
    exit();
    }