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

$sql4 = mysqli_query($link, "SELECT kategoriid FROM spilkategori WHERE spilid='$sid'");
if(!$sql4)
{
	$error = 'Kunne ikke finde spilkategorier.' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

while ($row = mysqli_fetch_array($sql4, MYSQLI_ASSOC))
{
	$categories[] =  $row['kategoriid'];
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
