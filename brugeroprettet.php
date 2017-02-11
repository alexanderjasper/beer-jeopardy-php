<?php

$link = mysqli_connect('copalex.com.mysql:3306', 'copalex_com', 'oljeopardy');
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$name = mysqli_real_escape_string($link, $_POST['brugernavn']);
 
// attempt insert query execution
$sql = "INSERT INTO copalex_com.bruger (navn) VALUES ('$name')";
if(mysqli_query($link, $sql)){
    echo 'Brugeren er oprettet. <p><a href="logind.php"><button style="height:50px;width:200px">Log ind</button></a></p>';
} else{
    echo '<p>Fejl. Brugernavnet eksisterer allerede.</p><div><a href="nybruger.php"><button style="height:50px;width:200px">Prøv igen</button></a></div>';
}
 
// close connection
mysqli_close($link);
?>