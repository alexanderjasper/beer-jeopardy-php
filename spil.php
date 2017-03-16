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

if (isset($_POST['spilkategoriselect']))
{
	// Lav query, der registrerer, at kategorien og pointværdien er valgt, og giver turen videre til den pågældende spiller
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

$sql4 = mysqli_query($link,
	"SELECT spilkategori.kategoriid,spilkategori.spilkategoriid,kategori.navn
	FROM spilkategori
	INNER JOIN kategori
	ON spilkategori.kategoriid=kategori.kategoriid
	WHERE spilkategori.spilid='$sid'
	AND deltagerid!=$delt");
if(!$sql4)
{
	$error = 'Kunne ikke finde spilkategorier.' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

$categories = array();
while ($row = mysqli_fetch_array($sql4, MYSQLI_ASSOC))
{
	$categories[] =  array($row['kategoriid'],$row['spilkategoriid'],$row['navn']);
}

foreach ($categories as $cat)
{
	$sql100 = mysqli_query($link, "SELECT vundet100 FROM spilkategori WHERE spilkategoriid='$cat[1]'");
	$row1 = mysqli_fetch_array($sql100);
	$vundet100 = $row1['vundet100'];
	$sql200 = mysqli_query($link, "SELECT vundet200 FROM spilkategori WHERE spilkategoriid='$cat[1]'");
	$row2 = mysqli_fetch_array($sql200);
	$vundet200 = $row2['vundet200'];
	$sql300 = mysqli_query($link, "SELECT vundet300 FROM spilkategori WHERE spilkategoriid='$cat[1]'");
	$row3 = mysqli_fetch_array($sql300);
	$vundet300 = $row3['vundet300'];
	$sql400 = mysqli_query($link, "SELECT vundet400 FROM spilkategori WHERE spilkategoriid='$cat[1]'");
	$row4 = mysqli_fetch_array($sql400);
	$vundet400 = $row4['vundet400'];
	$sql500 = mysqli_query($link, "SELECT vundet500 FROM spilkategori WHERE spilkategoriid='$cat[1]'");
	$row5 = mysqli_fetch_array($sql500);
	$vundet500 = $row5['vundet500'];
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
