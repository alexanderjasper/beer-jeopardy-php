<?php
	include('conn.php');
	if (isset($_SESSION['brugernavn']) || isset($_POST['brugernavn']))
	{
		include 'startside.php';
	}
	else
	{
		include 'forside.php';
	}
?>
