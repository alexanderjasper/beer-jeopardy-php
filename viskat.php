<?php
include('conn.php');

$name = mysqli_real_escape_string($link, $_GET['bruger']);

if(!$name)
{
	$error = 'Kunne ikke finde brugernavn: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

$katid = $_GET['katid'];
$result1 = mysqli_query($link, "SELECT * FROM kategori WHERE kategoriid='$katid'");
$row = mysqli_fetch_array($result1);

if(!$result1)
{
	$error = 'Kunne ikke finde bruger-id: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

include 'viskat.output.php';
?>
