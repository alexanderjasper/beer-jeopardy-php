<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="10">
<head>
  <title>Kontrolpanel</title>
</head>
<body>
  <p>Hej <?php echo $name ?>. Det er din tur. Vælg en kategori.</p>
    <?php foreach ($categories as $cat): ?>
      <p>
        <a href="viskat.php?katid=<?php echo $cat?>&bruger=<?php echo $name?>"><?php echo htmlspecialchars($cat, ENT_QUOTES, 'UTF-8'); ?></a>
      </p>
    <?php endforeach; ?>
  <div>
    <a href="spil.php?spilid=<?php echo $sid ?>&bruger=<?php echo $name ?>"><button style="height:50px;width:200px">Start spil</button></a>
  </div>
  <div>
    <a href="index.php"><button style="height:50px;width:200px">Log ud</button></a>
  </div>
</body>
</html>
