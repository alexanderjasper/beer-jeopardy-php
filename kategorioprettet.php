<?php
include('conn.php');

$kategorinavn = mysqli_real_escape_string($link, $_POST['kategorinavn']);
$svA = mysqli_real_escape_string($link, $_POST['100pt']);
$svB = mysqli_real_escape_string($link, $_POST['200pt']);
$svC = mysqli_real_escape_string($link, $_POST['300pt']);
$svD = mysqli_real_escape_string($link, $_POST['400pt']);
$svE = mysqli_real_escape_string($link, $_POST['500pt']);

$name = $_GET['bruger'];
$result1 = mysqli_query($link, "SELECT brugerid FROM bruger WHERE navn='$name'");
$row = mysqli_fetch_assoc($result1);
$uid = $row['brugerid'];
$sql = "INSERT INTO kategori (navn,100point,200point,300point,400point,500point,brugerid) VALUES ('$kategorinavn','$svA','$svB','$svC','$svD','$svE','$uid')";

if(mysqli_query($link, $sql)){
	echo 'Kategorien er oprettet. <p><a href="kontrolpanel.php?brugernavn=';
	echo $name;
	echo '"><button style="height:50px;width:200px">Tilbage til kontrolpanel</button></a></p>';
} else{
	echo '<p>Fejl. Brugernavnet eksisterer allerede.</p><div><a href="nybruger.php"><button style="height:50px;width:200px">Prøv igen $sql</button></a></div>'  . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>
