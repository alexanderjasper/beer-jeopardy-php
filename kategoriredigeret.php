<?php
include('conn.php');

$editcat = mysqli_real_escape_string($link, $_POST['editcat']);
$svA = mysqli_real_escape_string($link, $_POST['100pt']);
$svB = mysqli_real_escape_string($link, $_POST['200pt']);
$svC = mysqli_real_escape_string($link, $_POST['300pt']);
$svD = mysqli_real_escape_string($link, $_POST['400pt']);
$svE = mysqli_real_escape_string($link, $_POST['500pt']);


$sql = "UPDATE kategori SET 100point='$svA', 200point='$svB', 300point='$svC', 400point='$svD', 500point='$svD' WHERE kategoriid='$editcat'";

if(mysqli_query($link, $sql)){
	echo 'Kategorien er redigeret. <p><a href="kategorier.php"><button class="menubutton">Tilbage til Mine kategorier</button></a></p>';
} else{
	echo '<p>Fejl. Brugernavnet eksisterer allerede.</p><div><a href="nybruger.php"><button class="menubutton">Prøv igen $sql</button></a></div>'  . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>
