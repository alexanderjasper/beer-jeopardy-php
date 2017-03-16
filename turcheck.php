<?php
include('conn.php');

$tur = mysqli_real_escape_string($link, $_SESSION['tur']);
$delt = mysqli_real_escape_string($link, $_SESSION['deltager']);

$sql = mysqli_query($link, "SELECT tur FROM deltager WHERE deltagerid='$delt'");
$row = mysqli_fetch_assoc($sql);
$dbtur = $row['tur'];
$_SESSION['tur'] = $dbtur;

if ($tur == $dbtur)
{
  $data = false;
}
else {
  $data = true;
}

echo json_encode($data);
?>
