<?php
include('conn.php');

$name = $_SESSION['brugernavn'];
$uid = $_SESSION['userid'];
$sid = $_SESSION['spilid'];

$sql = mysqli_query($link, "DELETE FROM deltager WHERE spilid='$sid' AND brugerid='$uid'");

include 'forladspil.output.php';

// close connection
mysqli_close($link);
?>
