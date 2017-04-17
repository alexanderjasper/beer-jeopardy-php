<?php
include('conn.php');

if (isset($_POST['brugernavn']))
{
	$_SESSION['brugernavn'] = $_POST['brugernavn'];
}

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
$_SESSION['userid'] = $uid;

if(!$result1 || $uid == 0)
{
	unset($_SESSION['brugernavn']);
	$error = 'Fejl. Brugernavnet findes ikke. ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

if (isset($_POST['adgangskode']))
{
	$result2 = mysqli_query($link, "SELECT pwhash FROM bruger WHERE brugerid='$uid'");
	$row = mysqli_fetch_assoc($result2);
	$pwhash = $row['pwhash'];
	if (!password_verify($_POST['adgangskode'], $pwhash))
	{
		unset($_SESSION['brugernavn']);
		$error = 'Adgangskoden er forkert.';
		include 'error.html.php';
		exit();
	}
}

$result = mysqli_query($link, "SELECT * FROM kategori WHERE brugerid='$uid'");

if(!$result)
{
	$error = 'Kunne ikke hente kategorier: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

while ($row = mysqli_fetch_array($result))
{
	$categories[] = array($row['navn'],$row['kategoriid']);
}

include 'startside.output.php';

$_SESSION['pagemem'] = 'front';
?>
