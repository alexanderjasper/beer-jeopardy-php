<?php
include('conn.php');
include('class_lib.php');

$user = new User($link);
$user->create($_POST['brugernavn'], $_POST['adgangskode']);

include 'index.php';
// close connection
mysqli_close($link);
?>
