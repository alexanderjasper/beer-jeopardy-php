<!DOCTYPE html>
<html>
<?php include 'preamble.html' ?>
<body>
	<div class="screen-text">
		<?php include 'menubar.php';?>
		<p>
			<?php if ($foundgame) { ?>
				<p>
					Du deltager allerede i spillet <b><?php echo $gamename ?></b>.
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
								<input type="submit" value="Opret" class="menubutton">
							</div>
						</div>
					</form>
				<?php } else { ?>
					<p>
						Du skal oprette en kategori, før du kan oprette et spil.
					</p>
					<p>
						<a href="nykategori.php"><button class="menubutton">Opret en kategori</button></a>
					</p>
				<?php } ?>
			<?php } ?>
		</p>
	</div>
</body>
</html>
