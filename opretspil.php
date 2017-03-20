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
		<p>
			<form action="nytspil.php" method="post">
				<p>Vælg et navn til spillet:</p>
				<div>
					<input type="text" name="gamename" class="name-field">
					<div>
						<input type="submit" value="Opret" class="menubutton smallbutton">
					</div>
				</div>
			</form>
		</p>
		<div>
			<a href="index.php"><button class="menubutton">Tilbage til forsiden</button></a>
		</div>
	</div>
</body>
</html>
