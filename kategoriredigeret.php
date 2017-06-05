<?php
include('conn.php');

$editcat = mysqli_real_escape_string($link, $_POST['editcat']);
$answers = $_POST['answers'];


$sql = mysqli_query($link, "UPDATE kategori SET 100point='$answers[0]', 200point='$answers[1]', 300point='$answers[2]', 400point='$answers[3]', 500point='$answers[4]' WHERE kategoriid='$editcat'");

include 'kategoriredigeret.output.php';

// close connection
mysqli_close($link);
?>
