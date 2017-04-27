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

    $(document).ready(function()
    {
      $('#selectbutton').click(function()
      {
        var e = document.getElementById("selectform");
        var value = e.options[e.selectedIndex].value;
        var text = e.options[e.selectedIndex].text;
        confirm('Er du sikker på, at du vil vælge '.concat("<?php echo htmlspecialchars($cat[2], ENT_QUOTES, 'UTF-8'); ?>").concat(' til ').concat(value).concat(' point?'));
        });
      })
	</script>
</head>
<body>
  <?php include 'menubar.php';?>
  <div class="screen-text">
    <?php if ($lastcatowner == true) { ?>
      <p>
        Du har <?php echo $userpoints ?> point. Det er din tur, og der er kun din egen kategori tilbage. Vælg et pointantal.
      </p>
    <?php } else { ?>
      <?php if ($count == 1) { ?>
        <p>
          Du er i øjeblikket den eneste deltager i spillet. Vent, indtil nogen tilmelder sig.
        </p>
      <?php } else { ?>
        <p>
          Du har <?php echo $userpoints ?> point. Det er din tur. Vælg en kategori og et pointtal.
        </p>
      <?php } ?>
    <?php } ?>
    <?php foreach ($categories as $cat): ?>
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
        <form action="spil.php" method="post">
          <p>
            <div>
              <b><?php echo htmlspecialchars($cat[2].':', ENT_QUOTES, 'UTF-8'); ?></b>
            </div>
            <select name="pointchoice" class="dropdown" id="selectform">
              <?php if ($row1['vundet100'] == NULL) : ?>
                <option value='100'> 100 </option>
              <?php endif; ?>
              <?php if ($row2['vundet200'] == NULL) : ?>
                <option value='200'> 200 </option>
              <?php endif; ?>
              <?php if ($row3['vundet300'] == NULL) : ?>
                <option value='300'> 300 </option>
              <?php endif; ?>
              <?php if ($row4['vundet400'] == NULL) : ?>
                <option value='400'> 400 </option>
              <?php endif; ?>
              <?php if ($row5['vundet500'] == NULL) : ?>
                <option value='500'> 500 </option>
              <?php endif; ?>
            </select>
            <input type='hidden' name='spilcatchoice' value=<?php echo htmlspecialchars($cat[1], ENT_QUOTES, 'UTF-8'); ?>>
            <div>
              <input type="submit" value="Vælg" class="menubutton" id="selectbutton">
            </div>
          </p>
        </form>
      <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
</body>
</html>
