<?php
include('conn.php');

$delt = mysqli_real_escape_string($link, $_GET['deltager']);
$name = mysqli_real_escape_string($link, $_GET['bruger']);
$sid = mysqli_real_escape_string($link, $_GET['spilid']);
$kid = mysqli_real_escape_string($link, $_GET['katid']);

if(!$delt)
{
	$error = 'Kunne ikke finde deltagerid: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}
if(!$name)
{
	$error = 'Kunne ikke finde brugernavn: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}
if(!$sid)
{
	$error = 'Kunne ikke finde spilid: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}
if(!$kid)
{
	$error = 'Kunne ikke finde kategoriid: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

$sql = mysqli_query($link, "INSERT INTO spilkategori (kategoriid,spilid) VALUES ('$kid','$sid')");

if(!$sql)
{
	$error = 'Kunne ikke tildele spilkategori.' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

$sql2 = mysqli_query($link, "SELECT tur FROM deltager WHERE deltagerid='$delt'");
$row2 = mysqli_fetch_assoc($sql2);
$tur = $row2['tur'];

if(!$sql2)
{
	$error = 'Kunne ikke finde status.' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

// Kode til at finde status:
$sql3 = mysqli_query($link, "SELECT status FROM spil WHERE spilid='$sid'");
$row3 = mysqli_fetch_assoc($sql3);
$status = $row3['status'];
if(!$sql3)
{
	$error = 'Kunne ikke finde status.' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

if ($tur == 1)
{
	include 'spil.output.tur.php';
}
else
{
	include 'spil.output.ntur.php';
}


?>
