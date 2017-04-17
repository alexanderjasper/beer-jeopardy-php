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
				<div>
					<label for="brugernavn">Ønsket brugernavn:</label>
				</div>
				<div>
					<input type="text" id="brugernavn" name="brugernavn" class="name-field">
				</div>
			</p>
			<p>
				<div>
					<label for="brugernavn">Ønsket adgangskode:</label>
				</div>
				<div>
					<input type="password" id="adgangskode" name="adgangskode" class="name-field">
				</div>
			</p>
			<div>
				<div>
					<input type="submit" value="Opret" class="menubutton">
				</div>
			</div>
		</form>
		<p>
			<a href="index.php"><button class="menubutton">Til startsiden</button></a>
		</p>
</body>
</html>
