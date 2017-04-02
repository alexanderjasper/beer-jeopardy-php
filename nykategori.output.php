<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>Øljeopardy</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
	<?php include 'menubar.php';?>
	<div class="screen-text">
		<p>
			Her kan du oprette en ny kategori.
		</p>
		<form action="kategorioprettet.php" method="post">
			Kategoriens navn:<br>
			<textarea name="kategorinavn" class="category-name-field"></textarea><br>
			Svaret til 100 point:<br>
			<textarea name="100pt" class="answer-edit-field"></textarea><br>
			Svaret til 200 point:<br>
			<textarea name="200pt" class="answer-edit-field"></textarea><br>
			Svaret til 300 point:<br>
			<textarea name="300pt" class="answer-edit-field"></textarea><br>
			Svaret til 400 point:<br>
			<textarea name="400pt" class="answer-edit-field"></textarea><br>
			Svaret til 500 point:<br>
			<textarea name="500pt" class="answer-edit-field"></textarea><br>
			<div>
				<input type="submit" value="Opret" class="menubutton">
			</div>
		</form>
	</div>
</body>
</html>
