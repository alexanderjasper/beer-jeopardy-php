<?php
include('conn.php');

$name = mysqli_real_escape_string($link, $_POST['brugernavn']);

$sql = "INSERT INTO bruger (navn) VALUES ('$name')";
if(mysqli_query($link, $sql))
{
  include 'brugeroprettet.output.php';
}
else
{
  echo '<p>Fejl. Brugernavnet eksisterer allerede.</p><div><a href="nybruger.php"><button class="menubutton">Prøv igen</button></a></div>';
}
// close connection
mysqli_close($link);
?>
