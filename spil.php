<?php
include('conn.php');
if (isset($_POST['Submit']))
{
	$_SESSION['katid'] = $_POST['katid'];
	$_SESSION['bruger'] = $_POST['bruger'];
	$_SESSION['spilid'] = $_POST['spilid'];
	$_SESSION['deltager'] = $_POST['deltager'];
}

$delt = mysqli_real_escape_string($link, $_SESSION['deltager']);
$name = mysqli_real_escape_string($link, $_SESSION['bruger']);
$sid = mysqli_real_escape_string($link, $_SESSION['spilid']);
$kid = mysqli_real_escape_string($link, $_SESSION['katid']);
if (isset($_POST['newgame']))
{
	$isnew = mysqli_real_escape_string($link, $_POST['newgame']);
}
else
{
	$isnew = false;
}

if($isnew == true)
{
	$sql = mysqli_query($link, "INSERT INTO spilkategori (kategoriid,spilid,deltagerid,vundet100,vundet200,vundet300,vundet400,vundet500) VALUES ('$kid','$sid','$delt',NULL,NULL,NULL,NULL,NULL)");
}

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

$categories = array();
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
