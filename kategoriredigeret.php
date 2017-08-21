<?php
include('conn.php');

$editcat = mysqli_real_escape_string($link, $_POST['editcat']);
$answers = $_POST['answers'];
$categoryname = mysqli_real_escape_string($link, $_POST['categoryname']);


$sql = mysqli_query($link, "UPDATE kategori SET navn='$categoryname', 100point='$answers[0]', spm100='$answers[1]', 200point='$answers[2]', spm200='$answers[3]', 300point='$answers[4]', spm300='$answers[5]', 400point='$answers[6]', spm400='$answers[7]', 500point='$answers[8]', spm500='$answers[9]' WHERE kategoriid='$editcat'");

include 'kategoriredigeret.output.php';

// close connection
mysqli_close($link);
?>
