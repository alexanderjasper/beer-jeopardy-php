<?php
include('conn.php');

$kategorinavn = mysqli_real_escape_string($link, $_POST['kategorinavn']);
$svA = mysqli_real_escape_string($link, $_POST['100pt']);
$svB = mysqli_real_escape_string($link, $_POST['200pt']);
$svC = mysqli_real_escape_string($link, $_POST['300pt']);
$svD = mysqli_real_escape_string($link, $_POST['400pt']);
$svE = mysqli_real_escape_string($link, $_POST['500pt']);

$name = $_SESSION['brugernavn'];
$uid = $_SESSION['userid'];
$sql = "INSERT INTO kategori (navn,100point,200point,300point,400point,500point,brugerid) VALUES ('$kategorinavn','$svA','$svB','$svC','$svD','$svE','$uid')";

include 'kategorioprettet.output.php';

// close connection
mysqli_close($link);
?>
