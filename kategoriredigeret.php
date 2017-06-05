<?php
include('conn.php');

$editcat = mysqli_real_escape_string($link, $_POST['editcat']);
$svA = mysqli_real_escape_string($link, $_POST['100pt']);
$svB = mysqli_real_escape_string($link, $_POST['200pt']);
$svC = mysqli_real_escape_string($link, $_POST['300pt']);
$svD = mysqli_real_escape_string($link, $_POST['400pt']);
$svE = mysqli_real_escape_string($link, $_POST['500pt']);


$sql = mysqli_query($link, "UPDATE kategori SET 100point='$svA', 200point='$svB', 300point='$svC', 400point='$svD', 500point='$svE' WHERE kategoriid='$editcat'");

include 'kategoriredigeret.output.php';

// close connection
mysqli_close($link);
?>
