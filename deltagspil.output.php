<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
    <title>Kontrolpanel</title>
  </head>
<body>
  <p>Hej <?php echo $name ?>. Du deltager nu i spillet. Vælg den kategori, som du vil bruge.</p>
    <form action='spil.php' method='post'>
      <p>
        <select name="katid" style="width: 200px">
          <?php foreach ($categories as $cat): ?>
            <option value=<?php echo $cat[1] ?>><?php echo htmlspecialchars($cat[0], ENT_QUOTES, 'UTF-8'); ?></option>
          <?php endforeach; ?>
        </select>
      </p>
      <input type='hidden' name='deltager' value=<?php echo $did ?>>
      <input type='hidden' name='spilid' value=<?php echo $sid ?>>
      <input type='hidden' name='bruger' value=<?php echo $name ?>>
      <input type='hidden' name='newgame' value=false>
      <input type=submit name='Submit' style="height:50px;width:200px" value="Deltag i spil"></p>
    </form>
  <div>
    <a href="index.php"><button style="height:50px;width:200px">Log ud</button></a>
  </div>
</body>
</html>
