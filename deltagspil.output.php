<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
    <title>Kontrolpanel</title>
  </head>
<body>
  <p>Hej <?php echo $name ?>. Du deltager nu i spillet. Vælg den kategori, som du vil bruge.</p>
  <?php foreach ($categories as $cat): ?>
    <p>
      <a href="spil.php?spilid=<?php echo $sid ?>&deltager=<?php echo $did ?>&katid=<?php echo $cat[1] ?>&bruger=<?php echo $name ?>"><?php echo htmlspecialchars($cat[0], ENT_QUOTES, 'UTF-8'); ?></a>
    </p>
  <?php endforeach; ?>
  <div>
    <a href="index.php"><button style="height:50px;width:200px">Log ud</button></a>
  </div>
</body>
</html>
