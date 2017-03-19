<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Bruger oprettet</title>
  </head>
<body>
  <div class="screen-text">
    Brugeren er oprettet.
  </div>
  <div>
    <form action="kontrolpanel.php" method="post">
      <button class="menubutton">Gå til kontrolpanel</button>
      <input type="hidden" name="brugernavn" value="<?php echo $name?>">
    </form>
  </div>
</body>
</html>
