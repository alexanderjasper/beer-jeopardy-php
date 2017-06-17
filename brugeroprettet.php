<?php
include('conn.php');
include('class_lib.php');

$user = new User($link);
$user->create($_POST['brugernavn'], $_POST['adgangskode']);

include 'brugeroprettet.output.php';
// close connection
mysqli_close($link);
?>
