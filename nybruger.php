<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>Øljeopardy</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
	<div class="screen-text">
		<form action="brugeroprettet.php" method="post">
			<p>
				<label for="brugernavn">Skriv det ønskede brugernavn:</label>
			</p>
			<div>
				<input type="text" id="brugernavn" name="brugernavn" class="name-field"></textarea>
				<input type="submit" value="Opret" class="menubutton smallbutton">
			</div>
		</form>
		<p>
			<a href="index.php"><button class="menubutton">Tilbage til forsiden</button></a>
		</p>
</body>
</html>
