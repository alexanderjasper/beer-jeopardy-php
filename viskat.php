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

$katid = $_GET['katid'];
$result1 = mysqli_query($link, "SELECT * FROM kategori WHERE kategoriid='$katid'");
$row = mysqli_fetch_array($result1);

if(!$result1)
{  
	$error = 'Kunne ikke finde bruger-id: ' . mysqli_error($link);  
	include 'error.html.php';
	exit();
}

include 'viskat.output.php';
?>