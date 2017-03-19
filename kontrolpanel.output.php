<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
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
  <a href="findspil.php?bruger=<?php echo $name ?>"><button style="height:50px;width:200px">Deltag i et spil</button></a>
</div>
<div>
  <a href="opretspil.php"><button style="height:50px;width:200px">Opret nyt spil</button></a>
</div>
<div>
  <a href="kategorier.php"><button style="height:50px;width:200px">Mine kategorier</button></a>
</div>
<div>
  <a href="logout.php"><button style="height:50px;width:200px">Log ud</button></a>
</div>
</body>
</html>
