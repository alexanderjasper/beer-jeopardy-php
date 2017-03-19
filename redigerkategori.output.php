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
			Hej <?php echo $name ?>. Her kan du redigere i kategorien <?php echo $category[0] ?>.
		</p>
		<form action="kategoriredigeret.php" method="post">
			<div>
				Svaret til 100 point:
			</div>
			<div>
				<textarea name="100pt" class="answer-edit-field"><?php echo $category[1] ?></textarea>
			</div>
			<div>
				Svaret til 200 point:
			</div>
			<div>
				<textarea name="200pt" class="answer-edit-field"><?php echo $category[2] ?></textarea>
			</div>
			<div>
				Svaret til 300 point:
			</div>
			<div>
				<textarea name="300pt" class="answer-edit-field"><?php echo $category[3] ?></textarea>
			</div>
			<div>
				Svaret til 400 point:
			</div>
			<div>
				<textarea name="400pt" class="answer-edit-field"><?php echo $category[4] ?></textarea>
			</div>
			<div>
				Svaret til 500 point:
			</div>
			<div>
				<textarea name="500pt" class="answer-edit-field"><?php echo $category[5] ?></textarea>
			</div>
			<input type="submit" value="Gem" class="menubutton smallbutton">
			<input type="hidden" name="editcat" value="<?php echo $editcat ?>">
		</form>
		<p>
			<a href="kategorier.php"><button class="menubutton">Tilbage til Mine kategorier</button></a>
		</p>
	</div>
</body>
</html>
