<?php
include('conn.php');

$name = $_SESSION['brugernavn'];
$uid = $_SESSION['userid'];
$sid = $_SESSION['spilid'];

$sql = mysqli_query($link,
"SELECT spilkategori.spilkategoriid, deltager.tur
FROM deltager
JOIN spilkategori ON deltager.deltagerid=spilkategori.deltagerid
WHERE deltager.brugerid='$uid'
AND deltager.spilid='$sid'");
$row = mysqli_fetch_assoc($sql);
$spilkatid = $row['spilkategoriid'];

mysqli_query($link, "DELETE FROM deltager WHERE spilid='$sid' AND brugerid='$uid'");
mysqli_query($link, "DELETE FROM spilkategori WHERE spilkategoriid='$spilkatid'");

if($row['tur'] == 1 or $row['tur'] == 2)
{
  $sql = mysqli_query($link, "SELECT deltagerid FROM deltager WHERE spilid='$sid'");
  $row = mysqli_fetch_assoc($sql);
  $firstdeltager = $row['deltagerid'];
  mysqli_query($link, "UPDATE deltager SET tur='1' WHERE deltagerid='$firstdeltager'");
}



include 'forladspil.output.php';

// close connection
mysqli_close($link);
?>
