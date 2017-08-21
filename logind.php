<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<title>Øljeopardy</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
	<div class="screen-text">
		<?php include 'menubar.php';?>
		<form action="index.php" method="post">
			<p>
				<div>
					Brugernavn:
				</div>
				<div>
					<input type="text" name="brugernavn" class="name-field">
				</div>
			</p>
			<p>
				<div>
					Adgangskode:
				</div>
				<div>
					<input type="password" name="adgangskode" class="name-field">
				</div>
			</p>
			<p>
				<div>
					<input type="submit" value="Log ind" class="menubutton">
				</div>
			</p>
		</form>
	</div>
</body>
</html>
<?php exit();