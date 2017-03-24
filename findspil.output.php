<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Øljeopardy</title>
</head>
<body>
<div class="screen-text">
  <div>
    <?php if ($catcount == 0) { ?>
      Du skal oprette en kategori, før du kan deltage i et spil.
      <p>
        <a href="nykategori.php"><button class="menubutton">Opret en kategori</button></a>
      </p>
    <?php } else { ?>
      <?php if (empty($spil)) { ?>
        Der er ingen aktive spil i øjeblikket.
        <p>
          <a href="opretspil.php"><button class="menubutton">Opret nyt spil</button></a>
        </p>
      <?php } else { ?>
        Vælg et spil for at deltage.
        <form action="deltagspil.php" method=post>
          <select name="spilid" class="dropdown">
            <?php foreach ($spil as $sp): ?>
              <div>
                <option value="<?php echo $sp[0]?>"><?php echo htmlspecialchars($sp[1], ENT_QUOTES, 'UTF-8'); ?></option>
              </div>
            <?php endforeach; ?>
          </select>
          <div>
            <input type="submit" value="Deltag" class="menubutton smallbutton">
          </div>
        </form>
      <?php } ?>
    <?php } ?>
  </div>
  <div>
    <a href="startside.php"><button class="menubutton">Til startsiden</button></a>
  </div>
</div>
</body>
</html>
