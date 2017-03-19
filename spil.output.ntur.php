<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Kontrolpanel</title>
  <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
  <script>
		setInterval(function() {
      $.getJSON("turcheck.php", function(data) {
        if (data) {
          window.location.href = "spil.php";
        }
      })
    }, 2000);
	</script>
</head>
<body>
  <p>Hej <?php echo $name ?>. Det er ikke din tur. Du har <?php echo $userpoints ?> point.</p>
  <div>
    <a href="index.php"><button class="menubutton">Til startsiden</button></a>
  </div>
</body>
</html>
