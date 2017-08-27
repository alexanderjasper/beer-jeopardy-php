<!DOCTYPE html>
<html>
<?php include 'preamble.html' ?>
<body>
	<div class="screen-text">
		<?php include 'menubar.php';?>
		<?php if (isset($error)) { ?>
			<div class="alert alert-danger alert-dismissable">
				<?php echo $error; ?>
			</div>
		<?php } ?>
		<form action="nybruger.php" method="post">
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
	</div
</body>
</html>
