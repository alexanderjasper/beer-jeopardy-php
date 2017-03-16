<?php
include('conn.php');

$name = mysqli_real_escape_string($link, $_GET['bruger']);

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

$result = mysqli_query($link, "SELECT spilid FROM spil WHERE status='aktiv' AND aktivtidspunkt > NOW() - INTERVAL 2 HOUR");

if(!$result)
{
	$error = 'Kunne ikke hente spil: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

$spil = Array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$spil[] =  $row['spilid'];
}

include 'findspil.output.php';
?>