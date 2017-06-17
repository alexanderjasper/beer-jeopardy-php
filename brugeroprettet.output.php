<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Øljeopardy</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  </head>
<body>
  <div class="screen-text">
    <?php if(!isset($user->Error)) { ?>
      <p>
        Brugeren er oprettet.
      </p>
    <?php } else { ?>
      <p>
        <?php echo $user->Error ?>
      </p>
      <div>
        <a href="nybruger.php"><button class="menubutton">Prøv igen</button></a>
      </div>
    <?php } ?>
    <p>
			<a href="index.php"><button class="menubutton">Til startsiden</button></a>
		</p>
  </div>
</body>
</html>
