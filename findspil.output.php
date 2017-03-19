<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Aktive spil</title>
</head>
<body>
<div class="screen-text">
  <p>
    <?php if (empty($spil)) { ?>
      Der er ingen aktive spil i øjeblikket.
    <?php } else { ?>
      Her er de spil, der er aktive i øjeblikket. Tryk på et spil for at deltage.
    <?php } ?>
    <?php foreach ($spil as $sp): ?>
      <p>
        <a href="deltagspil.php?spilid=<?php echo $sp[0]?>&bruger=<?php echo $name?>"><?php echo htmlspecialchars($sp[1], ENT_QUOTES, 'UTF-8'); ?></a>
      </p>
    <?php endforeach; ?>
  </p>
</div>
<div class="screen-text">
  <a href="kontrolpanel.php"><button class="menubutton">Til startsiden</button></a>
</div>
</body>
</html>
