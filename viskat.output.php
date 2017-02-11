<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
    <title>Kontrolpanel</title>  
  </head>  
<body>  
<p>Velkommen <?php echo $name ?>. Her er svarene i kategorien <b><?php print_r($row['navn']); ?></b>:</p>
  <p>
    <div><u>
      100 point:
    </u></div>
    <div>
      <?php print_r($row['100point']) ?>
    </div>
  </p>
  <p>
    <div><u>
      200 point:
    </u></div>
    <div>
      <?php print_r($row['200point']) ?>
    </div>
  </p>
  <p>
    <div><u>
      300 point:
    </u></div>
    <div>
      <?php print_r($row['300point']) ?>
    </div>
  </p>
  <p>
    <div><u>
      400 point:
    </u></div>
    <div>
      <?php print_r($row['400point']) ?>
    </div>
  </p>
  <p>
    <div><u>
      500 point:
    </u></div>
    <div>
      <?php print_r($row['500point']) ?>
    </div>
  </p>
  <div>
    <a href="kontrolpanel.php?brugernavn=<?php echo $name ?>"><button style="height:50px;width:200px">Tilbage til kontrolpanel</button></a>
  </div>
  <div>
    <a href="index.php"><button style="height:50px;width:200px">Log ud</button></a>
  </div>
</body>  
</html>