<?php
include('conn.php');

$name = mysqli_real_escape_string($link, $_POST['brugernavn']);

// attempt insert query execution
$sql = "INSERT INTO bruger (navn) VALUES ('$name')";
if(mysqli_query($link, $sql)){
    echo 'Brugeren er oprettet. <p><a href="kontrolpanel.php?brugernavn=';
    echo $name;
    echo '"><button style="height:50px;width:200px">Gå til kontrolpanel</button></a></p>';
} else{
    echo '<p>Fejl. Brugernavnet eksisterer allerede.</p><div><a href="nybruger.php"><button style="height:50px;width:200px">Prøv igen</button></a></div>';
}

// close connection
mysqli_close($link);
?>
