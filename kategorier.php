<?php
include('conn.php');

$uid = mysqli_real_escape_string($link, $_SESSION['userid']);
$name = mysqli_real_escape_string($link, $_SESSION['brugernavn']);

if (isset($_POST['deletecat'])) {
	$catid = $_POST['deletecat'];
	$sql = mysqli_query($link, "DELETE FROM kategori WHERE kategoriid='$catid'");
	$categoryDeleted = true;
}

if (isset($_POST['createcat'])) {
	$answers = $_POST['answers'];
	$categoryname = mysqli_real_escape_string($link, $_POST['categoryname']);
	$sql = mysqli_query($link, "INSERT INTO kategori (navn,100point,spm100,200point,spm200,300point,spm300,400point,spm400,500point,spm500,brugerid) VALUES ('$categoryname','$answers[0]','$answers[1]','$answers[2]','$answers[3]','$answers[4]','$answers[5]','$answers[6]','$answers[7]','$answers[8]','$answers[9]','$uid')");
	$categoryCreated = true;
}

if (isset($_POST['editcat'])) {
	$editcat = mysqli_real_escape_string($link, $_POST['editcat']);
	$answers = $_POST['answers'];
	$categoryname = mysqli_real_escape_string($link, $_POST['categoryname']);
	$sql = mysqli_query($link, "UPDATE kategori SET navn='$categoryname', 100point='$answers[0]', spm100='$answers[1]', 200point='$answers[2]', spm200='$answers[3]', 300point='$answers[4]', spm300='$answers[5]', 400point='$answers[6]', spm400='$answers[7]', 500point='$answers[8]', spm500='$answers[9]' WHERE kategoriid='$editcat'");
	$categoryEdited = true;
}

$sql = mysqli_query($link, "SELECT * FROM kategori WHERE brugerid='$uid'");
while ($row = mysqli_fetch_array($sql))
{
	$categories[] = array($row['navn'],$row['kategoriid']);
}

include 'kategorier.output.php';
?>
