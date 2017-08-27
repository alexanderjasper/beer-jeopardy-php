<!DOCTYPE html>
<html>
<?php include 'preamble.html' ?>
<body>
  <div class="screen-text">
    <?php include 'menubar.php';?>
    <?php if (isset($newuser)) { ?>
      <div class="alert alert-success alert-dismissable">
        Brugeren er oprettet.
      </div>
    <?php } ?>
    <p>
      Velkommen <?php echo $name ?>.
    </p>
    <p>
      <div>
        <a href="findspil.php"><button class="menubutton">Deltag i et spil</button></a>
      </div>
      <div>
        <a href="opretspil.php"><button class="menubutton">Opret nyt spil</button></a>
      </div>
      <div>
        <a href="logout.php"><button class="menubutton">Log ud</button></a>
      </div>
    </p>
  </div>
</body>
</html>
