<?php

$link = mysqli_connect('copalex.com.mysql:3306', 'copalex_com', 'oljeopardy');
if($link === false){
    die("ERROR: Kunne ikke oprette forbindelse til databaseserver. " . mysqli_connect_error());
}
if (!mysqli_set_charset($link, 'utf8'))
{
	$output = 'Kunne ikke indstille tegnkodning for databaseforbindelse.';  
	include 'error.html.php';
	exit();
}  
if (!mysqli_select_db($link, 'copalex_com'))
{  
	$error = 'Kunne ikke finde database.';
	include 'error.html.php';
	exit();
}

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