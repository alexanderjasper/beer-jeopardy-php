<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Kontrolpanel</title>
</head>
<body>
  <?php
    if (empty($categories))
    {
      echo "<p>Velkommen $name. Du har endnu ikke oprettet nogen kategorier.</p>";
    }
    else
    {
      echo "<p>Velkommen $name. Her er dine kategorier.</p>";
      foreach ($categories as $cat): ?>
      <p>
        <a href="viskat.php?katid=<?php echo $cat[1]?>&bruger=<?php echo $name?>"><?php echo htmlspecialchars($cat[0], ENT_QUOTES, 'UTF-8'); ?></a>
      </p>
    <?php endforeach;
    }
  ?>
<div>
  <a href="findspil.php?bruger=<?php echo $name ?>"><button class="menubutton">Deltag i et spil</button></a>
</div>
<div>
  <a href="opretspil.php"><button class="menubutton">Opret nyt spil</button></a>
</div>
<div>
  <a href="kategorier.php"><button class="menubutton">Mine kategorier</button></a>
</div>
<div>
  <a href="logout.php"><button class="menubutton">Log ud</button></a>
</div>
</body>
</html>
