<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Øljeopardy</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
  <?php include 'menubar.php';?>
  <div class="screen-text">
    <?php if (empty($categories)) { ?>
      <p>Du har endnu ikke oprettet nogen kategorier.</p>
    <?php } else { ?>
      <p>Vælg en kategori, som du vil redigere.</p>
      <form action="redigerkategori.php" method=post>
        <select name="editcat" class="dropdown">
          <?php foreach ($categories as $cat): ?>
            <div>
              <option value='<?php echo $cat[1] ?>'> <?php echo htmlspecialchars($cat[0], ENT_QUOTES, 'UTF-8'); ?> </option>
            </div>
          <?php endforeach ?>
        </select>
        <div>
          <input type="submit" value="Rediger" class="menubutton">
        </div>
      </form>
    <?php } ?>
    <p>
      <a href="nykategori.php"><button class="menubutton">Opret ny kategori</button></a>
    </p>
  </div>
</body>
</html>
