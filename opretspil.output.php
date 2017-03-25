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
			<?php if ($catcount > 0) {  ?>
				<form action="nytspil.php" method="post">
					<p>Vælg et navn til spillet:</p>
					<div>
						<input type="text" name="gamename" class="name-field">
						<div>
							<input type="submit" value="Opret" class="menubutton smallbutton">
						</div>
					</div>
				</form>
			<?php } else { ?>
				<p>
					Du skal oprette en kategori, før du kan oprette et spil.
				</p>
				<p>
					<a href="nykategori.php"><button class="menubutton">Opret ny kategori</button></a>
				</p>
			<?php } ?>
		</p>
		<div>
			<a href="index.php"><button class="menubutton">Til startsiden</button></a>
		</div>
	</div>
</body>
</html>
