<!DOCTYPE html>
<style>
.radio-toolbar input[type="radio"] {
  display: none;
}

.radio-toolbar label {
  display: inline-block;
  border: none;
	font-family: inherit;
	font-size: inherit;
	color: inherit;
	background: none;
	cursor: pointer;
	text-transform: uppercase;
	letter-spacing: 1px;
	font-weight: 700;
	outline: none;
	position: relative;
	transition: all 0.3s;

  background: #368015;
	color: #fff;


  -webkit-appearance: none;

  font-size: 15px;
  padding: 10px 10px 0px 10px;
  height: 30px;
  vertical-align: top;
	box-shadow: 0 2px #553F00;
  border-radius: 5px;
}

.inactive-button {
  background: #ff0000;
	color: #fff;
	box-shadow: 0 6px #0D3E0F;
}

.radio-toolbar input[type="radio"]:checked+label {
  background-color: #bbb;
}
</style>
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

    $(document).ready(function()
    {
      $('#selectbutton').click(function()
      {
        var e = document.getElementById("selectform");
        var value = e.options[e.selectedIndex].value;
        var text = e.options[e.selectedIndex].text;
        confirm('Er du sikker på, at du vil vælge '.concat("<?php if (isset($cat)) {echo htmlspecialchars($cat[2], ENT_QUOTES, 'UTF-8'); } ?>").concat(' til ').concat(value).concat(' point?'));
        });
      })
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
      <form action="spil.php" method="post">
        <?php foreach ($thisgame->game_categories as $cat): ?>
          <div>
            <?php
              $sql100 = mysqli_query($link, "SELECT vundet100 FROM spilkategori WHERE spilkategoriid='$cat[1]'");
              $row1 = mysqli_fetch_array($sql100);

              $sql200 = mysqli_query($link, "SELECT vundet200 FROM spilkategori WHERE spilkategoriid='$cat[1]'");
              $row2 = mysqli_fetch_array($sql200);

              $sql300 = mysqli_query($link, "SELECT vundet300 FROM spilkategori WHERE spilkategoriid='$cat[1]'");
              $row3 = mysqli_fetch_array($sql300);

              $sql400 = mysqli_query($link, "SELECT vundet400 FROM spilkategori WHERE spilkategoriid='$cat[1]'");
              $row4 = mysqli_fetch_array($sql400);

              $sql500 = mysqli_query($link, "SELECT vundet500 FROM spilkategori WHERE spilkategoriid='$cat[1]'");
              $row5 = mysqli_fetch_array($sql500);
            ?>
            <?php if ($row1['vundet100'] == NULL or $row2['vundet200'] == NULL or $row3['vundet300'] == NULL or $row4['vundet400'] == NULL or $row5['vundet500'] == NULL) : ?>
            <p>
              <div>
                <b><?php echo htmlspecialchars($cat[2].':', ENT_QUOTES, 'UTF-8'); ?></b>
              </div>
              <div class="radio-toolbar">
                <?php if ($row1['vundet100'] == NULL) : ?>
                    <input type="radio" name='choice' value='<?php echo $cat[1]; ?>100' id='<?php echo $cat[1]; ?>radio1' name='selector'>
                    <label for="<?php echo $cat[1]; ?>radio1">100</label>
                <?php else : ?>
                    <label for="<?php echo $cat[1]; ?>radio1" style="background: #ff0000; box-shadow: 0 2px #aa0000;">100</label>
                <?php endif; ?>
                <?php if ($row2['vundet200'] == NULL) : ?>
                    <input type="radio" name='choice' value='<?php echo $cat[1]; ?>200' id='<?php echo $cat[1]; ?>radio2' name='selector'>
                    <label for="<?php echo $cat[1]; ?>radio2">200</label>
                <?php else : ?>
                    <label for="<?php echo $cat[1]; ?>radio2" style="background: #ff0000; box-shadow: 0 2px #aa0000;">200</label>
                <?php endif; ?>
                <?php if ($row3['vundet300'] == NULL) : ?>
                    <input type="radio" name='choice' value='<?php echo $cat[1]; ?>300' id='<?php echo $cat[1]; ?>radio3' name='selector'>
                    <label for="<?php echo $cat[1]; ?>radio3">300</label>
                <?php else : ?>
                    <label for="<?php echo $cat[1]; ?>radio3" style="background: #ff0000; box-shadow: 0 2px #aa0000;">300</label>
                <?php endif; ?>
                <?php if ($row4['vundet400'] == NULL) : ?>
                    <input type="radio" name='choice' value='<?php echo $cat[1]; ?>400' id='<?php echo $cat[1]; ?>radio4' name='selector'>
                    <label for="<?php echo $cat[1]; ?>radio4">400</label>
                <?php else : ?>
                    <label for="<?php echo $cat[1]; ?>radio4" style="background: #ff0000; box-shadow: 0 2px #aa0000;">400</label>
                <?php endif; ?>
                <?php if ($row5['vundet500'] == NULL) : ?>
                    <input type="radio" name='choice' value='<?php echo $cat[1]; ?>500' id='<?php echo $cat[1]; ?>radio5' name='selector'>
                    <label for="<?php echo $cat[1]; ?>radio5">500</label>
                <?php else : ?>
                    <label for="<?php echo $cat[1]; ?>radio5" style="background: #ff0000; box-shadow: 0 2px #aa0000;">500</label>
                <?php endif; ?>
              </div>            
              <input type='hidden' name='spilcatchoice' value=<?php echo htmlspecialchars($cat[1], ENT_QUOTES, 'UTF-8'); ?>>
            </p>
          <?php endif; ?>
          </div>
        <?php endforeach; ?>
        <div>
          <input type="submit" value="Vælg" class="menubutton" id="selectbutton">
        </div>
      </form>
    <?php } ?>
  </div>
</body>
</html>
