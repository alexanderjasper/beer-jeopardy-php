<?php
include('conn.php');

$name = mysqli_real_escape_string($link, $_SESSION['brugernavn']);
if (isset($_SESSION['pagemem']))
{
  $pagemem = $_SESSION['pagemem'];
}

include 'nykategori.output.php';

// close connection
mysqli_close($link);
?>
