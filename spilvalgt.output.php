<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="10">
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Kontrolpanel</title>
</head>
<body>
  <p>Hej <?php echo $name ?>. Du har nu valgt en kategori.</p>
  <div>
    <a href="spil.php?spilid=<?php echo $sid ?>&bruger=<?php echo $name ?>"><button class="menubutton">Start spillet</button></a>
  </div>
  <div>
    <a href="index.php"><button class="menubutton">Log ud</button></a>
  </div>
</body>
</html>
