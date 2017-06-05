<?php
include('conn.php');

$answers = $_POST['answers'];
$categoryname = mysqli_real_escape_string($link, $_POST['categoryname']);

$name = $_SESSION['brugernavn'];
$uid = $_SESSION['userid'];
$sql = mysqli_query($link, "INSERT INTO kategori (navn,100point,200point,300point,400point,500point,brugerid) VALUES ('$categoryname','$answers[0]','$answers[1]','$answers[2]','$answers[3]','$answers[4]','$uid')");

if (isset($_SESSION['pagemem']))
{
  $pagemem = $_SESSION['pagemem'];
}

include 'kategorioprettet.output.php';

// close connection
mysqli_close($link);
?>
