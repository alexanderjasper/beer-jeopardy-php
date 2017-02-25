<?php
	include('conn.php');
	if (isset($_SESSION['brugernavn']))
	{
		include 'kontrolpanel.php';
	}
	else
	{
		include 'startside.php';
	}
?>
