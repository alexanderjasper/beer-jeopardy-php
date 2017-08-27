<!DOCTYPE html>
<html>
<?php include 'preamble.html' ?>
<body>
  <div class="screen-text">
    <?php include 'menubar.php';?>
    <h2>Kategorier</h2>
    <div class="alert alert-success alert-dismissable">
      Kategorien er redigeret.
    </div>
    <?php if (empty($categories)) { ?>
      <p>Du har endnu ikke oprettet nogen kategorier.</p>
    <?php } else { if (isset($catid)) { ?>
      <p><b>Kategorien er slettet</b></p>
      <?php } ?>
      <p>Vælg en kategori, som du vil redigere.</p>
      <form action="redigerkategori.php" method=post>
        <select name="editcat" class="dropdown">
          <?php foreach ($categories as $cat): ?>
            <div>
              <option value='<?php echo $cat[1] ?>'> <?php echo htmlspecialchars($cat[0], ENT_QUOTES, 'UTF-8'); ?> </option>
            </div>
          <?php endforeach ?>
        </select>
        <div>
          <input type="submit" value="Rediger" class="menubutton">
        </div>
      </form>
    <?php } ?>
    <p>
      <a href="nykategori.php"><button class="menubutton">Opret ny kategori</button></a>
    </p>
  </div>
</body>
</html>
