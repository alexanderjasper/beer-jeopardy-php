<!DOCTYPE html>
<html>
<?php include 'preamble.html' ?>
<body>
	<div class="screen-text">
		<?php include 'menubar.php';?>
  	Kategorien er oprettet.
    <p>
      <?php if ($pagemem == 'findspil') { ?>
        <a href="findspil.php"><button class="menubutton">Deltag i et spil</button></a>
      <?php } elseif ($pagemem == 'opretspil') { ?>
        <a href="opretspil.php"><button class="menubutton">Opret nyt spil</button></a>
      <?php } else { ?>
        <a href="findspil.php"><button class="menubutton">Deltag i et spil</button></a>
        <a href="opretspil.php"><button class="menubutton">Opret nyt spil</button></a>
      <?php } ?>
    </p>
  </div>
</body>
</html>
