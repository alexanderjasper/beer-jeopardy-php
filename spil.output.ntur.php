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
    <?php foreach ($thisgame->scoreboard as $score) { ?>
      <div>
        Navn: <?php echo $score->name; ?>, Score: <?php echo $score->points; ?>
      </div>
    <?php } ?>
    <p>
      <?php if ($thisgame->turn_type == 1) { ?>
        Det er <?php echo $thisgame->turn_holder; if (substr($thisgame->turn_holder, -1)=='s') echo "'";?>s tur til at vælge kategori.
      <?php } else { ?>
        <?php echo $thisgame->latest_chooser; ?> har valgt <?php echo $thisgame->selected_category_owner; if (substr($thisgame->selected_category_owner, -1)=='s') echo "'";?>s kategori <?php echo $thisgame->selected_category; ?> til <?php echo $thisgame->selected_points; ?> point.
      <?php } ?>
    </p>
    <p>
      <?php foreach ($thisgame->displayCategories as $cat): ?>
        <p>
          <div>
            <b><?php echo htmlspecialchars($cat->CategoryName.':', ENT_QUOTES, 'UTF-8'); ?></b>
          </div>
          <div>
          <?php if ($cat->active100) : ?>
              <div class="category-radio-button-label active">100</div>
          <?php else : ?>
              <div class="category-radio-button-label inactive">100</div>
          <?php endif; ?>
          <?php if ($cat->active200) : ?>
              <div class="category-radio-button-label active">200</div>
          <?php else : ?>
              <div class="category-radio-button-label inactive">200</div>
          <?php endif; ?>
          <?php if ($cat->active300) : ?>
              <div class="category-radio-button-label active">300</div>
          <?php else : ?>
              <div class="category-radio-button-label inactive">300</div>
          <?php endif; ?>
          <?php if ($cat->active400) : ?>
              <div class="category-radio-button-label active">400</div>
          <?php else : ?>
              <div class="category-radio-button-label inactive">400</div>
          <?php endif; ?>
          <?php if ($cat->active500) : ?>
              <div class="category-radio-button-label active">500</div>
          <?php else : ?>
              <div class="category-radio-button-label inactive">500</div>
          <?php endif; ?>
        </p>
      <?php endforeach; ?>
    </p>
  </div>
</body>
</html>
