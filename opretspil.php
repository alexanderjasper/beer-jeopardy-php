<?php
include('conn.php');

$name = mysqli_real_escape_string($link, $_SESSION['brugernavn']);
$uid = mysqli_real_escape_string($link, $_SESSION['userid']);

$sql5 = mysqli_query($link, "SELECT deltagerid FROM deltager WHERE brugerid='$uid'");
$row5 = mysqli_fetch_array($sql5);
$did = $row5['deltagerid'];

$sql4 = mysqli_query($link, "SELECT * FROM kategori WHERE brugerid='$uid'");

if(!$sql4)
{
	$error = 'Kunne ikke hente kategorier: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

$sql = mysqli_query($link, "SELECT count(*) AS count FROM kategori WHERE brugerid='$uid'");
$row = mysqli_fetch_assoc($sql);
$catcount = $row['count'];

$sql = mysqli_query($link, "SELECT count(*) AS count, s.spilid as spilid FROM spil as s JOIN deltager as d ON d.spilid=s.spilid WHERE s.status='aktiv' AND s.aktivtidspunkt > NOW() - INTERVAL 2 HOUR AND d.brugerid='$uid'");
$row = mysqli_fetch_assoc($sql);
$gamecount = $row['count'];
$_SESSION['spilid'] = $row['spilid'];

if ($catcount > 0)
{
	$categories = array();
	while ($row = mysqli_fetch_array($sql4))
	{
		$categories[] = array($row['navn'],$row['kategoriid']);
	}
}

$_SESSION['pagemem']='opretspil';

include 'opretspil.output.php';
?>
