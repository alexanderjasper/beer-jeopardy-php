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

$sql = mysqli_query($link, "INSERT INTO spil (brugerid,status,aktivtidspunkt) VALUES ('$uid','aktiv',NOW())");

if(!$sql)
{  
	$error = 'Kunne ikke oprette spil.' . mysqli_error($link);  
	include 'error.html.php';
	exit();
}

$sql2 = mysqli_query($link, "SELECT MAX(spilid) as max FROM spil");
$row2 = mysqli_fetch_array($sql2);
$sid = $row2['max'];

if(!$sql2)
{  
	$error = 'Kunne ikke finde spilid.' . mysqli_error($link);  
	include 'error.html.php';
	exit();
}

$sql3 = mysqli_query($link, "INSERT INTO deltager (brugerid,spilid,points,tur) VALUES ('$uid','$sid',0,1)");

if(!$sql3)
{  
	$error = 'Kunne ikke oprette dig som deltager.' . mysqli_error($link);  
	include 'error.html.php';
	exit();
}

$sql5 = mysqli_query($link, "SELECT MAX(deltagerid) as max FROM deltager");
$row5 = mysqli_fetch_array($sql5);
$did = $row5['max'];

$sql4 = mysqli_query($link, "SELECT * FROM kategori WHERE brugerid='$uid'");

if(!$sql4)
{  
	$error = 'Kunne ikke hente kategorier: ' . mysqli_error($link);  
	include 'error.html.php';
	exit();
}

while ($row = mysqli_fetch_array($sql4))  
	{
		$categories[] = array($row['navn'],$row['kategoriid']);
	}
include 'nytspil.output.php';

// Kode til at finde status:
// 
// $sql3 = mysqli_query($link, "SELECT status FROM spil WHERE spilid='$sid'");
// $row3 = mysqli_fetch_assoc($sql3);
// $status = $row3['status'];
// if(!$sql3)
// {  
// 	$error = 'Kunne ikke finde status.' . mysqli_error($link);  
// 	include 'error.html.php';
// 	exit();
// }
?>