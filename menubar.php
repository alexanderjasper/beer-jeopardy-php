<?php
if(!isset($_SESSION))
{
    include 'conn.php';
}

if(isset($_SESSION['userid']))
{
$uid = $_SESSION['userid'];

$sql = mysqli_query($link, "SELECT count(*) AS count FROM spil as s JOIN deltager as d ON d.spilid=s.spilid WHERE s.status='aktiv' AND s.aktivtidspunkt > NOW() - INTERVAL 2 HOUR AND d.brugerid='$uid'");
$row = mysqli_fetch_assoc($sql);
$gamecount = $row['count'];
}

include 'menubar.output.php';

?>
