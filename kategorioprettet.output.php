<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Øljeopardy</title>
</head>
<body>
  <div class="screen-text">
  	Kategorien er oprettet.
    <p>
      <?php if ($pagemem == 'findspil') { ?>
        <a href="findspil.php"><button class="menubutton">Deltag i et spil</button></a>
      <?php } elseif ($pagemem == 'opretspil') { ?>
        <a href="opretspil.php"><button class="menubutton">Opret nyt spil</button></a>
      <?php } else { ?>
        <a href="kategorier.php"><button class="menubutton">Tilbage til Mine kategorier</button></a>
      <?php } ?>
    </p>
  </div>
</body>
</html>
