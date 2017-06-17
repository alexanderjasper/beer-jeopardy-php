<?php

if(isset($_SESSION['userid']))
{
$uid = $_SESSION['userid'];

$sql = mysqli_query($link, "SELECT count(*) AS count, s.spilid as spilid, s.navn as navn FROM spil as s JOIN deltager as d ON d.spilid=s.spilid WHERE s.status='aktiv' AND s.aktivtidspunkt > NOW() - INTERVAL 2 HOUR AND d.brugerid='$uid'");
$row = mysqli_fetch_assoc($sql);
$gamecount = $row['count'];
$_SESSION['spilid'] = $row['spilid'];
}

include 'menubar.output.php';

?>
