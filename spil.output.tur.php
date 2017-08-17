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
    <?php if ($thisgame->last_category_owner == true) { ?>
      <p>
        Point: <?php echo $thisgame->user_points ?>
      </p>
      <p>
        Det er din tur, og der er kun din egen kategori tilbage. Vælg et pointantal.
      </p>
    <?php } else { ?>
      <?php if ($thisgame->new_category_count == 1) { ?>
        <p>
          Du er i øjeblikket den eneste deltager i spillet. Vent, indtil nogen tilmelder sig.
        </p>
      <?php } else { ?>
        <p>
          Point: <?php echo $thisgame->user_points ?>
        </p>
        <p>
          Det er din tur. Vælg en kategori og et pointtal.
        </p>
      <?php } ?>
    <?php } ?>
    <?php if ($thisgame->new_category_count != 1) { ?>
      <form action="spil.php" method="post" onsubmit="return confirm('Er du sikker?')">
        <?php foreach ($thisgame->displayCategories as $cat): ?>
          <p>
            <div>
              <b><?php echo htmlspecialchars($cat->CategoryName.':', ENT_QUOTES, 'UTF-8'); ?></b>
            </div>
            <div>
            <?php if ($cat->active100) : ?>
              <input type="radio" name='choice' class='category-radio-button' value='<?php echo $cat->CategoryId; ?>100' id='<?php echo $cat->CategoryId; ?>radio1'>
              <label class="category-radio-button-label active" for="<?php echo $cat->CategoryId; ?>radio1">100</label>
            <?php else : ?>
              <div class="category-radio-button-label inactive">100</div>
            <?php endif; ?>
            <?php if ($cat->active200) : ?>
              <input type="radio" name='choice' class='category-radio-button' value='<?php echo $cat->CategoryId; ?>200' id='<?php echo $cat->CategoryId; ?>radio2'>
              <label class="category-radio-button-label active" for="<?php echo $cat->CategoryId; ?>radio2">200</label>
            <?php else : ?>
              <div class="category-radio-button-label inactive">200</div>
            <?php endif; ?>
            <?php if ($cat->active300) : ?>
              <input type="radio" name='choice' class='category-radio-button' value='<?php echo $cat->CategoryId; ?>300' id='<?php echo $cat->CategoryId; ?>radio3'>
              <label class="category-radio-button-label active" for="<?php echo $cat->CategoryId; ?>radio3">300</label>
            <?php else : ?>
              <div class="category-radio-button-label inactive">300</div>
            <?php endif; ?>
            <?php if ($cat->active400) : ?>
              <input type="radio" name='choice' class='category-radio-button' value='<?php echo $cat->CategoryId; ?>400' id='<?php echo $cat->CategoryId; ?>radio4'>
              <label class="category-radio-button-label active" for="<?php echo $cat->CategoryId; ?>radio4">400</label>
            <?php else : ?>
              <div class="category-radio-button-label inactive">400</div>
            <?php endif; ?>
            <?php if ($cat->active500) : ?>
              <input type="radio" name='choice' class='category-radio-button' value='<?php echo $cat->CategoryId; ?>500' id='<?php echo $cat->CategoryId; ?>radio5'>
              <label class="category-radio-button-label active" for="<?php echo $cat->CategoryId; ?>radio5">500</label>
            <?php else : ?>
              <div class="category-radio-button-label inactive">500</div>
            <?php endif; ?>  
            </div>            
            <input type='hidden' name='spilcatchoice' value=<?php echo htmlspecialchars($cat->CategoryId, ENT_QUOTES, 'UTF-8'); ?>>
          </p>
        <?php endforeach; ?>
        <div>
          <input type="submit" value="Vælg" class="menubutton" id="selectbutton">
        </div>
      </form>
    <?php } ?>
  </div>
</body>
</html>
