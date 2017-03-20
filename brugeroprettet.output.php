<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Bruger oprettet</title>
  </head>
<body>
  <div class="screen-text">
    <?php if(mysqli_query($link, $sql)) { ?>
      <p>
        Brugeren er oprettet.
      </p>
    <?php } else { ?>
      <p>
        Fejl. Brugernavnet eksisterer allerede.
      </p>
      <div>
        <a href="nybruger.php"><button class="menubutton">Prøv igen</button></a>
      </div>
    <?php } ?>
    <div>
      <form action="kontrolpanel.php" method="post">
        <button class="menubutton">Gå til kontrolpanel</button>
        <input type="hidden" name="brugernavn" value="<?php echo $name?>">
      </form>
    </div>
  </div>
</body>
</html>
