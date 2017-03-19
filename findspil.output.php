<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Aktive spil</title>
</head>
<body>
  <?php
  if (empty($spil)) {
    echo "<p>Der er ingen aktive spil i øjeblikket.</p>";
  }
  else {
    echo "<p>Her er de spil, der er aktive i øjeblikket. Tryk på et spil for at deltage.</p>";
    foreach ($spil as $sp): ?>
    <p>
      <a href="deltagspil.php?spilid=<?php echo $sp[0]?>&bruger=<?php echo $name?>"><?php echo htmlspecialchars($sp[1], ENT_QUOTES, 'UTF-8'); ?></a>
    </p>
  <?php endforeach;
}
?>
<div>
  <a href="nykategori.php?bruger=<?php echo $name ?>"><button class="menubutton">Opret ny kategori</button></a>
</div>
<div>
  <a href="opretspil.php?bruger=<?php echo $name ?>"><button class="menubutton">Opret nyt spil</button></a>
</div>
<div>
  <a href="index.php"><button class="menubutton">Log ud</button></a>
</div>
</body>
</html>
