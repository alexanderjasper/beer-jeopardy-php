<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
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
  <div class="screen-text">
    <?php include 'menubar.php';?>
    <h2>Læs op</h2>
    <table style="border: 1px solid black; padding: 10px; width: 50%;" align="center">
      <?php foreach ($thisgame->scoreboard as $score) { ?>
        <tr>
          <td style="width:60%">
            <?php echo $score->name; ?>
          </td>
          <td style="width:40%">
            <?php echo $score->points; ?>
          </td>
        </tr>
      <?php } ?>
    </table>
    <p>
      Din kategori, <i><?php echo $thisgame->jeopardy_category_name; ?></i>, er blevet valgt til <?php echo $thisgame->jeopardy_points; ?> point.
    </p>
    <table align="center" style="width:80%;">
      <tr><th>Svar</th><th>Spørgsmål</th></tr>
      <tr>
        <td><?php echo $thisgame->jeopardy_answer ?></td>
        <td><?php echo $thisgame->jeopardy_question ?></td>
      </tr>
    </table>
    <p>
      <form action=spil.php method=post onsubmit="return confirm('Er du sikker?')">
        <div>
          Hvilken bruger vandt runden?
        </div>
        <select name="roundwinner" class="dropdown" id="selectform">
          <?php foreach ($thisgame->players as $player): ?>
            <option value='<?php echo $player[0] ?>'> <?php echo $player[1] ?> </option>
          <?php endforeach; ?>
        </select>
        <input type="hidden" name="pointswon" value="<?php echo $thisgame->jeopardy_points ?>">
        <input type="hidden" name="categorywon" value="<?php echo $thisgame->jeopardy_game_category_id ?>">
        <div>
          <input type="submit" value="Vælg" class="menubutton" id="selectbutton">
        </div>
      </form>
    </p>
  </div>
</body>
</html>
