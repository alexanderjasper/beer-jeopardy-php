<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
    <title>Bruger oprettet</title>
  </head>
<body>
  Brugeren er oprettet.
  <p>
    <form action="kontrolpanel.php" method="post">
      <button style="height:50px;width:200px">Gå til kontrolpanel</button>
      <input type="hidden" name="brugernavn" value="<?php echo $name?>">
    </form>
  </p>
</body>
</html>
