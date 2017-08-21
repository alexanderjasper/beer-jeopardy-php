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
    <h1>
			Øljeopardy
		</h1>
    <p>
      Velkommen <?php echo $name ?>.
    </p>
    <p>
      <div>
        <a href="findspil.php"><button class="menubutton">Deltag i et spil</button></a>
      </div>
      <div>
        <a href="opretspil.php"><button class="menubutton">Opret nyt spil</button></a>
      </div>
      <div>
        <a href="logout.php"><button class="menubutton">Log ud</button></a>
      </div>
    </p>
  </div>
</body>
</html>
