<!DOCTYPE html>
<html>
<?php include 'preamble.game.html' ?>
<body>
  <div class="screen-text">
    <?php include 'menubar.php';?>
    <h4>Gæt</h4>
    <table style="border: 1px solid black; border-radius: 4px; padding: 10px; width: 50%;" align="center">
      <tr><td style="border-bottom: 1px solid black;" colspan="2">Point</td></tr>
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
