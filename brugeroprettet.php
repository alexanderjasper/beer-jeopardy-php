<?php
include('conn.php');

$name = mysqli_real_escape_string($link, $_POST['brugernavn']);

$sql = "INSERT INTO bruger (navn) VALUES ('$name')";
include 'brugeroprettet.output.php';
// close connection
mysqli_close($link);
?>
