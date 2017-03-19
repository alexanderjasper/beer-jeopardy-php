<?php
include('conn.php');

$tur = mysqli_real_escape_string($link, $_SESSION['tur']);
$count = mysqli_real_escape_string($link, $_SESSION['count']);
$delt = mysqli_real_escape_string($link, $_SESSION['deltager']);
$sid = mysqli_real_escape_string($link, $_SESSION['spilid']);

$sql = mysqli_query($link, "SELECT tur FROM deltager WHERE deltagerid='$delt'");
$row = mysqli_fetch_assoc($sql);
$dbtur = $row['tur'];
$_SESSION['tur'] = $dbtur;

$sql = mysqli_query($link, "SELECT count(*) as count FROM spilkategori WHERE spilid='$sid'");
$row = mysqli_fetch_assoc($sql);
$dbcount = $row['count'];
$_SESSION['count'] = $dbtur;

if ($tur == $dbtur && $count == $dbcount)
{
  $data = false;
}
else {
  $data = true;
}

echo json_encode($data);
?>
