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
      Point: <?php echo $thisgame->user_points; ?>
    </p>
    <p>
      <?php if ($thisgame->turn_type == 1) { ?>
        Det er <?php echo $thisgame->turn_holder; if (substr($thisgame->turn_holder, -1)=='s') echo "'";?>s tur til at vælge kategori.
      <?php } else { ?>
        <?php echo $thisgame->latest_chooser; ?> har valgt <?php echo $thisgame->selected_category_owner; if (substr($thisgame->selected_category_owner, -1)=='s') echo "'";?>s kategori <?php echo $thisgame->selected_category; ?> til <?php echo $thisgame->selected_points; ?> point.
      <?php } ?>
    </p>
  </div>
</body>
</html>
