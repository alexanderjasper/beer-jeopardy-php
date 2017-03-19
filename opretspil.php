<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>Øljeopardy</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
	<form action="nytspil.php" method="post">
		<div>
			<label for="spilnavn">Vælg et navn til spillet:</label>
		</div>
		<div>
			<textarea id="spilnavn" name="gamename" rows="1" cols="28"></textarea><input type="submit" value="Opret spil"/>
		</div>
	</form>
	<div>
		<a href="index.php"><button class="menubutton">Tilbage til forsiden</button></a>
	</div>
</body>
</html>
