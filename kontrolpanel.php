<?php
include('conn.php');

$name = mysqli_real_escape_string($link, $_GET['brugernavn']);

if(!$name)
{
	$error = 'Kunne ikke finde brugernavn: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

$result1 = mysqli_query($link, "SELECT brugerid FROM bruger WHERE navn='$name'");
$row = mysqli_fetch_assoc($result1);
$uid = $row['brugerid'];

if(!$result1 || $uid == 0)
{
	$error = 'Fejl. Brugernavnet findes ikke. ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

$result = mysqli_query($link, "SELECT * FROM kategori WHERE brugerid='$uid'");

if(!$result)
{
	$error = 'Kunne ikke hente kategorier: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

while ($row = mysqli_fetch_array($result))
{
	$categories[] = array($row['navn'],$row['kategoriid']);
}

include 'kontrolpanel.output.php';
?>
