<?php
include('conn.php');

$answers = $_POST['answers'];
$categoryname = mysqli_real_escape_string($link, $_POST['categoryname']);

$name = $_SESSION['brugernavn'];
$uid = $_SESSION['userid'];
$sql = mysqli_query($link, "INSERT INTO kategori (navn,100point,spm100,200point,spm200,300point,spm300,400point,spm400,500point,spm500,brugerid) VALUES ('$categoryname','$answers[0]','$answers[1]','$answers[2]','$answers[3]','$answers[4]','$answers[5]','$answers[6]','$answers[7]','$answers[8]','$answers[9]','$uid')");

if (isset($_SESSION['pagemem']))
{
  $pagemem = $_SESSION['pagemem'];
}

include 'kategorioprettet.output.php';

// close connection
mysqli_close($link);
?>
