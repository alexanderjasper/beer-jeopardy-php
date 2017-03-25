<?php
include('conn.php');

$name = $_SESSION['brugernavn'];
$uid = $_SESSION['userid'];
$sid = $_SESSION['spilid'];

$sql = mysqli_query($link,
"SELECT spilkategori.spilkategoriid
FROM deltager
JOIN spilkategori ON deltager.deltagerid=spilkategori.deltagerid
WHERE deltager.brugerid='$uid'
AND deltager.spilid='$sid'");
$row = mysqli_fetch_assoc($sql);
$spilkatid = $row['spilkategoriid'];

mysqli_query($link, "DELETE FROM deltager WHERE spilid='$sid' AND brugerid='$uid'");
mysqli_query($link, "DELETE FROM spilkategori WHERE spilkategoriid='$spilkatid'");



include 'forladspil.output.php';

// close connection
mysqli_close($link);
?>
