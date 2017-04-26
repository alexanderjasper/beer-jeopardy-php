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
    }, 2000);
	</script>
</head>
<body>
  <?php include 'menubar.php';?>
  <div class="screen-text">
    <p>
      <?php if ($turntype == 1) { ?>
        Det er <?php echo $turnholder; if (substr($turnholder, -1)=='s') echo "'";?>s tur til at vælge kategori.
      <?php } else { ?>
        <?php echo $latestchooser; ?> har valgt <?php echo $selectedcategoryowner; if (substr($selectedcategoryowner, -1)=='s') echo "'";?>s kategori <?php echo $selectedcategory ?> til <?php echo $selectedpoint ?> point.
      <?php } ?>
    </p>
    <p>
      Du har <?php echo $userpoints ?> point.
    </p>
  </div>
</body>
</html>
