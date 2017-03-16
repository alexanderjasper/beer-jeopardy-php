<?php
include('conn.php');

$name = mysqli_real_escape_string($link, $_GET['bruger']);
$sid = mysqli_real_escape_string($link, $_GET['spilid']);

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

$sql3 = mysqli_query($link, "INSERT INTO deltager (brugerid,spilid,point,tur) VALUES ('$uid','$sid',0,0)");

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

$categories = array();
while ($row = mysqli_fetch_array($sql4))
{
	$categories[] = array($row['navn'],$row['kategoriid']);
}
include 'deltagspil.output.php';

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
