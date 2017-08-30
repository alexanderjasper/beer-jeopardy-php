<!DOCTYPE html>
<html>
<?php include 'preamble.html' ?>
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