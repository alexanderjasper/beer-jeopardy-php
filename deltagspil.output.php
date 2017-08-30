<!DOCTYPE html>
<html>
<?php include 'preamble.html' ?>
<body>
  <div class="screen-text">
  <?php include 'menubar.php';?>
    <p>
      Vælg den kategori, som du vil bruge i spillet.
    </p>
    <p>
      <form action='spil.php' method='post'>
        <p>
          <select name="category_id" class="dropdown">
            <?php foreach ($categories as $cat): ?>
              <option value=<?php echo $cat[1] ?>><?php echo htmlspecialchars($cat[0], ENT_QUOTES, 'UTF-8'); ?></option>
            <?php endforeach; ?>
          </select>
        </p>
        <input type='hidden' name="participant_id" value=<?php echo $did ?>>
        <input type='hidden' name="game_id" value=<?php echo $sid ?>>
        <input type='hidden' name="username" value=<?php echo $name ?>>
        <input type='hidden' name="start_type" value=participate>
        <p>
          <input type=submit name="start_game" class="menubutton" value="Start spillet">
        </p>
      </form>
    </p>
  </div>
</body>
</html>
