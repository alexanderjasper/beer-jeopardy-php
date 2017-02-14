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

$sql = mysqli_query($link, "INSERT INTO spilkategori (kategoriid,spilid,deltagerid,vundet100,vundet200,vundet300,vundet400,vundet500) VALUES ('$kid','$sid','$delt',NULL,NULL,NULL,NULL,NULL)");

if(!$sql)
{
	$error = 'Kunne ikke tildele spilkategori.' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

include 'spilvalgt.output.php';
?>
