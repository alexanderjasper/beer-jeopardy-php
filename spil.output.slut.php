<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Øljeopardy</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
  <?php include 'menubar.php';?>
  <div class="screen-text">
    <p>
      Spillet er slut. Du fik <?php echo $thisgame->user_points ?> point.
    </p>
  </div>
</body>
</html>
