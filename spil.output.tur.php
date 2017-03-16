<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="10">
<head>
  <title>Kontrolpanel</title>
</head>
<body>
  <p>Hej <?php echo $name ?>. Det er din tur. Vælg en kategori.</p>
    <?php foreach ($categories as $cat): ?>
      <p>
        <?php
          echo htmlspecialchars($cat[2].':', ENT_QUOTES, 'UTF-8');

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

        <?php if($row1['vundet100']='NULL') : ?>
          <div>
            <form action=spil.php method=post>
              <input type='hidden' name='spilkategoriselect' value=<?php echo htmlspecialchars($cat[1], ENT_QUOTES, 'UTF-8') ?>>
            	<input type=submit name='pointsvalue' value="100" style="height:50px;width:100px">
            </form>
          </div>
        <?php endif; ?>

        <?php if($row1['vundet200']='NULL') : ?>
          <div>
            <form action=spil.php method=post>
              <input type='hidden' name='spilkategoriselect' value=<?php echo htmlspecialchars($cat[1], ENT_QUOTES, 'UTF-8') ?>>
            	<input type=submit name='pointsvalue' value="200" style="height:50px;width:100px">
            </form>
          </div>
        <?php endif; ?>

        <?php if($row1['vundet300']='NULL') : ?>
          <div>
            <form action=spil.php method=post>
              <input type='hidden' name='spilkategoriselect' value=<?php echo htmlspecialchars($cat[1], ENT_QUOTES, 'UTF-8') ?>>
            	<input type=submit name='pointsvalue' value="300" style="height:50px;width:100px">
            </form>
          </div>
        <?php endif; ?>

        <?php if($row1['vundet400']='NULL') : ?>
          <div>
            <form action=spil.php method=post>
              <input type='hidden' name='spilkategoriselect' value=<?php echo htmlspecialchars($cat[1], ENT_QUOTES, 'UTF-8') ?>>
            	<input type=submit name='pointsvalue' value="400" style="height:50px;width:100px">
            </form>
          </div>
        <?php endif; ?>

        <?php if($row1['vundet500']='NULL') : ?>
          <div>
            <form action=spil.php method=post>
              <input type='hidden' name='spilkategoriselect' value=<?php echo htmlspecialchars($cat[1], ENT_QUOTES, 'UTF-8') ?>>
            	<input type=submit name='pointsvalue' value="500" style="height:50px;width:100px">
            </form>
          </div>
        <?php endif; ?>
      </p>
    <?php endforeach; ?>
  <div
    <a href="index.php"><button style="height:50px;width:200px">Log ud</button></a>
  </div>
</body>
</html>
