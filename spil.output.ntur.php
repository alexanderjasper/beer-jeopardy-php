<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="refresh" content="10">
  <head>
    <title>Kontrolpanel</title>
  </head>
<body>
  <p>Hej <?php echo $name ?>. Det er ikke din tur.</p>
  <div>
    <a href="spil.php?spilid=<?php echo $sid ?>&bruger=<?php echo $name ?>"><button style="height:50px;width:200px">Start spil</button></a>
  </div>
  <div>
    <a href="index.php"><button style="height:50px;width:200px">Log ud</button></a>
  </div>
</body>
</html>
