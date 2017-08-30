<!DOCTYPE html>
<html>
<?php include 'preamble.html' ?>
<body>
  <div class="screen-text">
    <?php include 'menubar.php';?>
    <h4>Kategorier</h4>
    <?php if (isset($categoryDeleted)) { ?>
      <div class="alert alert-danger alert-dismissable">
        Kategorien er slettet.
      </div>
    <?php } if (empty($categories)) { ?>
      <p>Du har endnu ikke oprettet nogen kategorier.</p>
    <?php } else { ?>
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
