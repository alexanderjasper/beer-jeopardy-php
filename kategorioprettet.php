<?php
	$link = mysqli_connect('copalex.com.mysql:3306', 'copalex_com', 'oljeopardy');
	
	if($link === false){
	    die("Fejl: Kunne ikke oprette forbindelse til database. " . mysqli_connect_error());
	}

	if (!mysqli_set_charset($link, 'utf8'))
	{
		$output = 'Kunne ikke indstille tegnkodning for databaseforbindelse.';  
		include 'error.html.php';
		exit();
	}  

	if (!mysqli_select_db($link, 'copalex_com'))
	{  
		$error = 'Kunne ikke finde database.';
		include 'error.html.php';
		exit();
	}

	$kategorinavn = mysqli_real_escape_string($link, $_POST['kategorinavn']);
	$svA = mysqli_real_escape_string($link, $_POST['100pt']);
	$svB = mysqli_real_escape_string($link, $_POST['200pt']);
	$svC = mysqli_real_escape_string($link, $_POST['300pt']);
	$svD = mysqli_real_escape_string($link, $_POST['400pt']);
	$svE = mysqli_real_escape_string($link, $_POST['500pt']);

	// // attempt insert query execution
	$name = $_GET['bruger'];
	$result1 = mysqli_query($link, "SELECT brugerid FROM copalex_com.bruger WHERE navn='$name'");
	$row = mysqli_fetch_assoc($result1);
	$uid = $row['brugerid'];
	$sql = "INSERT INTO copalex_com.kategori (navn,100point,200point,300point,400point,500point,brugerid) VALUES ('$kategorinavn','$svA','$svB','$svC','$svD','$svE','$uid')";

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