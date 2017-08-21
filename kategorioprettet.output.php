<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <title>Øljeopardy</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
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
