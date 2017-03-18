<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <title>Kontrolpanel</title>
  <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
  <script>
		setInterval(function() {
      $.getJSON("turcheck.php", function(data) {
        if (data) {
          window.location.reload();
        }
      })
    }, 2000);
	</script>
</head>
<body>
  <p>Hej <?php echo $name ?>. Det er din tur. Vælg en kategori.</p>
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
        <form action=spil.php method=post>
          <p>
            <div>
              <?php echo htmlspecialchars($cat[2].':', ENT_QUOTES, 'UTF-8'); ?>
            </div>
            <select name="catchoice[]" style="width: 200px"> <!- 0 is selected spilkategori, 1 is the points value ->
              <?php if ($row1['vundet100']='NULL') : ?>
                <option value=[<?php echo htmlspecialchars($cat[1], ENT_QUOTES, 'UTF-8'); ?>, 100] > 100 </option>
              <?php endif; ?>
              <?php if ($row1['vundet200']='NULL') : ?>
                <option value=[<?php echo htmlspecialchars($cat[1], ENT_QUOTES, 'UTF-8'); ?>, 200] > 200 </option>
              <?php endif; ?>
              <?php if ($row1['vundet300']='NULL') : ?>
                <option value=[<?php echo htmlspecialchars($cat[1], ENT_QUOTES, 'UTF-8'); ?>, 300] > 300 </option>
              <?php endif; ?>
              <?php if ($row1['vundet400']='NULL') : ?>
                <option value=[<?php echo htmlspecialchars($cat[1], ENT_QUOTES, 'UTF-8'); ?>, 400] > 400 </option>
              <?php endif; ?>
              <?php if ($row1['vundet500']='NULL') : ?>
                <option value=[<?php echo htmlspecialchars($cat[1], ENT_QUOTES, 'UTF-8'); ?>, 500] > 500 </option>
              <?php endif; ?>
            </select>
          </p>
        </form>
      </div>
    <?php endforeach; ?>
  <div
    <a href="index.php"><button style="height:50px;width:200px">Log ud</button></a>
  </div>
</body>
</html>
