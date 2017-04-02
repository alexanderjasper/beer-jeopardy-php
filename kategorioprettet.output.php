<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Øljeopardy</title>
</head>
<body>
  <?php include 'menubar.php';?>
  <div class="screen-text">
  	Kategorien er oprettet.
    <p>
      <?php if ($pagemem == 'findspil') { ?>
        <a href="findspil.php"><button class="menubutton">Deltag i et spil</button></a>
      <?php } elseif ($pagemem == 'opretspil') { ?>
        <a href="opretspil.php"><button class="menubutton">Opret nyt spil</button></a>
      <?php } else { ?>
        <a href="startside.php"><button class="menubutton">Til startsiden</button></a>
      <?php } ?>
    </p>
  </div>
</body>
</html>
