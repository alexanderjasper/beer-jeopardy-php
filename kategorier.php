<?php
include('conn.php');

$uid = mysqli_real_escape_string($link, $_SESSION['userid']);
$name = mysqli_real_escape_string($link, $_SESSION['brugernavn']);
$sql = mysqli_query($link, "SELECT * FROM kategori WHERE brugerid='$uid'");

while ($row = mysqli_fetch_array($sql))
{
	$categories[] = array($row['navn'],$row['kategoriid']);
}

include 'kategorier.output.php';
?>
