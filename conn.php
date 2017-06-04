<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

$link = mysqli_connect('localhost:1864', 'bruger', 'jeopardy');

if (!$link)
{
  $error = 'Unable to connect to the database server.';
  include 'error.html.php';
  exit();
}

if (!mysqli_set_charset($link, 'utf8'))
{
  $error = 'Unable to set database connection encoding.';
  include 'error.html.php';
  exit();
}

if (!mysqli_select_db($link, 'jeopardy'))
{
  $error = 'Unable to locate the database.';
  include 'error.html.php';
  exit();
}
?>
