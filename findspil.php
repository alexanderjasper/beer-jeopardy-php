<?php
include('conn.php');

$name = mysqli_real_escape_string($link, $_SESSION['brugernavn']);

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

$result = mysqli_query($link, "SELECT spilid, navn FROM spil WHERE status='aktiv' AND aktivtidspunkt > NOW() - INTERVAL 2 HOUR");

if(!$result)
{
	$error = 'Kunne ikke hente spil: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

$spil = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$spil[] =  array($row['spilid'], $row['navn']);
}

$sql = mysqli_query($link, "SELECT COUNT(*) AS count FROM kategori WHERE brugerid='$uid'");
$row = mysqli_fetch_assoc($sql);
$catcount = $row['count'];

include 'findspil.output.php';

$_SESSION['pagemem'] = 'findspil';
?>
