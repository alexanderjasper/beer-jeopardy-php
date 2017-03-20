<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Kontrolpanel</title>
</head>
<body>
  <div class="screen-text">
    <p>Hej <?php echo $name ?>. Vælg den kategori, som du vil bruge i spillet.</p>
    	<p>
        <form action=spil.php method=post>
          <select name="katid" class="dropdown category-dropdown">
            <?php foreach ($categories as $cat): ?>
              <option value=<?php echo $cat[1] ?>><?php echo htmlspecialchars($cat[0], ENT_QUOTES, 'UTF-8'); ?></option>
            <?php endforeach; ?>
          </select>
          <input type='hidden' name='deltager' value=<?php echo $did ?>>
          <input type='hidden' name='spilid' value=<?php echo $sid ?>>
          <input type='hidden' name='bruger' value=<?php echo $name ?>>
          <input type='hidden' name='newgame' value=true>
        	<input type=submit name='Submit' class="menubutton smallbutton" value="Opret">
        </form>
    </p>
    <div>
      <a href="kontrolpanel.php"><button class="menubutton">Til startsiden</button></a>
    </div>
  </div>
</body>
</html>
