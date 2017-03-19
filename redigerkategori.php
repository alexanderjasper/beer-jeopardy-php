<?php
include('conn.php');

$uid = mysqli_real_escape_string($link, $_SESSION['userid']);
$name = mysqli_real_escape_string($link, $_SESSION['brugernavn']);
if (isset($_POST['editcat']))
{
	$editcat = $_POST['editcat'];
}

$sql = mysqli_query($link, "SELECT * FROM kategori WHERE kategoriid='$editcat'");
$row = mysqli_fetch_assoc($sql);
$category = array($row['navn'], $row['100point'], $row['200point'], $row['300point'], $row['400point'], $row['500point']);

include 'redigerkategori.output.php';
?>
