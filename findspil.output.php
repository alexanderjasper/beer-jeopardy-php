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
        <p>
          Der er ingen aktive spil i øjeblikket.
        </p>
        <p>
          <a href="opretspil.php"><button class="menubutton">Opret nyt spil</button></a>
        </p>
      <?php } else { ?>
        <?php if ($gamecount > 0) { ?>
          <p>
            Du deltager allerede i spillet <b><?php echo $gamename ?></b>.
            <div>
              <a href="spil.php"><button class="menubutton">Gå til spillet</button></a>
            </div>
            <div>
              <a href="forladspil.php"><button class="menubutton">Forlad spillet</button></a>
            </div>
          </p>
        <?php } else { ?>
          <p>
            Vælg et spil for at deltage.
          </p>
          <p>
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
          </p>
        <?php } ?>
      <?php } ?>
    <?php } ?>
  </div>
  <p>
    <a href="startside.php"><button class="menubutton">Til startsiden</button></a>
  </p>
</div>
</body>
</html>
