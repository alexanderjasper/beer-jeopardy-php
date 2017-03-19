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
  <p>Hej <?php echo $name ?>. Du har <?php echo $userpoints ?> point. Din kategori <i><?php echo $jeopardycatname ?></i> er blevet valgt til <?php echo $jeopardypoint ?> point. Svaret er:</p>
  <p><b> <?php echo $jeopardyans ?> </b></p>
  <p>
    <form action=spil.php method=post>
      <div>
        Hvilken bruger vandt runden?
      </div>
      <select name="roundwinner" class="player-dropdown">
        <?php foreach ($players as $player): ?>
          <option value='<?php echo $player[0] ?>'> <?php echo $player[1] ?> </option>
        <?php endforeach; ?>
      </select>
      <input type="hidden" name="pointswon" value="<?php echo $jeopardypoint ?>">
      <input type="hidden" name="categorywon" value="<?php echo $jeopardyspilcatid ?>">
      <input type="submit" value="Vælg">
    </form>
  </p>
  <div>
    <a href="index.php"><button class="menubutton">Log ud</button></a>
  </div>
</body>
</html>
