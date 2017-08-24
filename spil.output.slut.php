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
    <h2>
      Spillet er slut.
    </h2>
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
  </div>
</body>
</html>
