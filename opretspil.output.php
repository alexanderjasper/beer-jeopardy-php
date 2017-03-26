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
			<?php if ($gamecount > 0) { ?>
				<p>
					Du deltager allerede i et spil.
					<div>
						<a href="spil.php"><button class="menubutton">Gå til spillet</button></a>
					</div>
					<div>
						<a href="forladspil.php"><button class="menubutton">Forlad spillet</button></a>
					</div>
				</p>
			<?php } else { ?>
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
			<?php } ?>
		</p>
		<p>
			<a href="index.php"><button class="menubutton">Til startsiden</button></a>
		</p>
	</div>
</body>
</html>
