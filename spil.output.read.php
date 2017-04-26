<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Øljeopardy</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
  <script>
		setInterval(function() {
      $.getJSON("turcheck.php", function(data) {
        if (data) {
          window.location.href = "spil.php";
        }
      })
    }, 1000);
	</script>
</head>
<body>
  <?php include 'menubar.php';?>
  <div class="screen-text">
    <p>
      Du har <?php echo $userpoints ?> point. Din kategori, <i><?php echo $jeopardycatname ?></i>, er blevet valgt til <?php echo $jeopardypoint ?> point. Svaret er:
    </p>
    <p>
      <b><?php echo $jeopardyans ?></b>
    </p>
    <p>
      <form action=spil.php method=post>
        <div>
          Hvilken bruger vandt runden?
        </div>
        <select name="roundwinner" class="dropdown">
          <?php foreach ($players as $player): ?>
            <option value='<?php echo $player[0] ?>'> <?php echo $player[1] ?> </option>
          <?php endforeach; ?>
        </select>
        <input type="hidden" name="pointswon" value="<?php echo $jeopardypoint ?>">
        <input type="hidden" name="categorywon" value="<?php echo $jeopardyspilcatid ?>">
        <div>
          <input type="submit" value="Vælg" class="menubutton">
        </div>
      </form>
    </p>
  </div>
</body>
</html>
