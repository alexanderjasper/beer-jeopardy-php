<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <title>Øljeopardy</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  </head>
<body>
	<div class="screen-text">
		<?php include 'menubar.php';?>
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
  </div>
</body>
</html>
