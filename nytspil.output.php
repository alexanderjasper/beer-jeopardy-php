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
    <p>Vælg den kategori, som du vil bruge i spillet.</p>
    	<p>
        <form action=spil.php method=post>
          <select name="category_id" class="dropdown">
            <?php foreach ($categories as $cat): ?>
              <option value=<?php echo $cat[1] ?>><?php echo htmlspecialchars($cat[0], ENT_QUOTES, 'UTF-8'); ?></option>
            <?php endforeach; ?>
          </select>
          <input type='hidden' name="participant_id" value=<?php echo $did ?>>
          <input type='hidden' name="game_id" value=<?php echo $sid ?>>
          <input type='hidden' name="username" value=<?php echo $name ?>>
          <input type='hidden' name="start_type" value=new_game>
          <div>
        	  <input type=submit name ="start_game" class="menubutton" value="Start spillet">
          </div>
        </form>
    </p>
  </div>
</body>
</html>
