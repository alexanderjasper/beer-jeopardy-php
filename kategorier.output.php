<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Øljeopardy - Kategorier</title>
</head>
<body>
  <?php if (empty($categories)) { ?>
    <p>
      Hej <?php echo $name; ?>. Du har endnu ikke oprettet nogen kategorier.
    </p>
  <?php } else { ?>
    <p>
      Hej <?php echo $name; ?>. Vælg en kategori, som du vil redigere.
    </p>
    <p>
      <form action="redigerkategori.php" method=post>
        <select name="editcat" class="category-dropdown">
          <?php foreach ($categories as $cat): ?>
            <div>
              <option value='<?php echo $cat[1] ?>'> <?php echo htmlspecialchars($cat[0], ENT_QUOTES, 'UTF-8'); ?> </option>
            </div>
          <?php endforeach ?>
          <input type="submit" value="Vælg">
        </select>
      </form>
    </p>
  <?php } ?>
  <div>
    <a href="nykategori.php?bruger=<?php echo $name ?>"><button class="menubutton">Opret ny kategori</button></a>
  </div>
  <div>
    <a href="kontrolpanel.php"><button class="menubutton">Tilbage til kontrolpanel</button></a>
  </div>
</body>
</html>
