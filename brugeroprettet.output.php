<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Øljeopardy</title>
  </head>
<body>
  <?php include 'menubar.php';?>
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
  </div>
</body>
</html>
