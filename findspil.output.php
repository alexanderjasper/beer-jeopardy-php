<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
    <title>Aktive spil</title>
  </head>
<body>
  <?php
  if (empty($spil)) {
    echo "<p>Der er ingen aktive spil i øjeblikket.</p>";
  }
  else {
    echo "<p>Her er de spil, der er aktive i øjeblikket.</p>";
    foreach ($spil as $sp): ?>
      <p>
        <a href="deltagspil.php?spilid=<?php echo $sp?>&bruger=<?php echo $name?>"><?php echo htmlspecialchars($sp[0], ENT_QUOTES, 'UTF-8'); ?></a>
      </p>
    <?php endforeach;
  }
   ?>
  <div>
    <a href="nykategori.php?bruger=<?php echo $name ?>"><button style="height:50px;width:200px">Opret ny kategori</button></a>
  </div>
  <div>
    <a href="nytspil.php?bruger=<?php echo $name ?>"><button style="height:50px;width:200px">Opret nyt spil</button></a>
  </div>
  <div>
    <a href="index.php"><button style="height:50px;width:200px">Log ud</button></a>
  </div>
</body>
</html>
