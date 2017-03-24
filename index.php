<?php
	include('conn.php');
	if (isset($_SESSION['brugernavn']))
	{
		include 'startside.php';
	}
	else
	{
		include 'forside.php';
	}
?>
