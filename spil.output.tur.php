<!DOCTYPE html>
<html>
<?php include 'preamble.game.html' ?>
<body>
  <div class="screen-text">
  <?php include 'menubar.php';?>
  <h4>Vælg kategori</h4>
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
