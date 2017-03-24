<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Øljeopardy</title>
</head>
<body>
<div class="screen-text">
  <?php if (empty($categories)) { ?>
    <p>Hej <?php echo $name; ?>. Du har endnu ikke oprettet nogen kategorier.</p>
  <?php } else { ?>
    <p>Hej <?php echo $name; ?>. Vælg en kategori, som du vil redigere.</p>
    <form action="redigerkategori.php" method=post>
      <select name="editcat" class="dropdown">
        <?php foreach ($categories as $cat): ?>
          <div>
            <option value='<?php echo $cat[1] ?>'> <?php echo htmlspecialchars($cat[0], ENT_QUOTES, 'UTF-8'); ?> </option>
          </div>
        <?php endforeach ?>
      </select>
      <div>
        <input type="submit" value="Rediger" class="menubutton smallbutton">
      </div>
    </form>
  <?php } ?>
  <p>
    <a href="nykategori.php?bruger=<?php echo $name ?>"><button class="menubutton">Opret ny kategori</button></a>
  </p>
  <p>
    <a href="startside.php"><button class="menubutton">Til startsiden</button></a>
  </p>
</div>
</body>
</html>
