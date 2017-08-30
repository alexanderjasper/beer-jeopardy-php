<?php
include('conn.php');
include('class_lib.php');

if (isset($_POST['brugernavn'])) {
	$user = new User($link);
	$user->create($_POST['brugernavn'], $_POST['adgangskode']);
	if (!isset($user->Error)) {
		$newuser = true;
		include 'index.php';
	} else {
		$error = $user->Error;
		include 'nybruger.output.php';
	}
} else {
	include 'nybruger.output.php';
}
// close connection
mysqli_close($link);
?>
