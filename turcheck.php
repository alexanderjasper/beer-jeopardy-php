<?php
include('conn.php');

$sid = mysqli_real_escape_string($link, $_SESSION['spilid']);
$sql = mysqli_query($link, "SELECT version FROM spil WHERE spilid='$sid'");
$row = mysqli_fetch_assoc($sql);
$dbversion = $row['version'];

if (isset($_SESSION['version']) && $dbversion == $_SESSION['version']) {
  $data = false;
} else {
  $_SESSION['version'] = $dbversion;
  $data = true;
}

echo json_encode($data);
exit();
?>
