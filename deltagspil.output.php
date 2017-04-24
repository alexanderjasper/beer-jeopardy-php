<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Øljeopardy</title>
  </head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<body>
  <?php include 'menubar.php';?>
  <div class="screen-text">
    <p>
      Du deltager nu i spillet. Vælg den kategori, som du vil bruge.
    </p>
    <p>
      <form action='spil.php' method='post'>
        <p>
          <select name="katid" class="dropdown">
            <?php foreach ($categories as $cat): ?>
              <option value=<?php echo $cat[1] ?>><?php echo htmlspecialchars($cat[0], ENT_QUOTES, 'UTF-8'); ?></option>
            <?php endforeach; ?>
          </select>
        </p>
        <input type='hidden' name='deltager' value=<?php echo $did ?>>
        <input type='hidden' name='spilid' value=<?php echo $sid ?>>
        <input type='hidden' name='bruger' value=<?php echo $name ?>>
        <input type='hidden' name='newgame' value=false>
        <p>
          <input type=submit name='Submit' class="menubutton" value="Start spillet">
        </p>
      </form>
    </p>
  </div>
</body>
</html>
