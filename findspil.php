<?php
include('conn.php');

$name = mysqli_real_escape_string($link, $_SESSION['brugernavn']);
$uid = $_SESSION['userid'];

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

$sql = mysqli_query($link, "SELECT count(*) AS count FROM kategori WHERE brugerid='$uid'");
$row = mysqli_fetch_assoc($sql);
$catcount = $row['count'];

$sql = mysqli_query($link, "SELECT s.spilid as spilid, s.navn as navn FROM spil as s JOIN deltager as d ON d.spilid=s.spilid WHERE s.status='aktiv' AND s.aktivtidspunkt > NOW() - INTERVAL 2 HOUR AND d.brugerid='$uid'");
$row = mysqli_fetch_assoc($sql);
if ($row != null){
	$foundgame = true;
} else {
	$foundgame = false;
}
$_SESSION['spilid'] = $row['spilid'];
$gamename = $row['navn'];

include 'findspil.output.php';

$_SESSION['pagemem'] = 'findspil';
?>
