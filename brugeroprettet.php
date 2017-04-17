<?php
include('conn.php');

$name = mysqli_real_escape_string($link, $_POST['brugernavn']);
$password = mysqli_real_escape_string($link, $_POST['adgangskode']);
$passwordhash = password_hash("$password", PASSWORD_DEFAULT);

$sql = "INSERT INTO bruger (navn,pwhash) VALUES ('$name', '$passwordhash')";
include 'brugeroprettet.output.php';
// close connection
mysqli_close($link);
?>
