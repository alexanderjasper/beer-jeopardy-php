<ul class="menubar-list">
  <li class="menubar-listitem">
    <a class="menubar-listitem-a" href="index.php">
      <i class="fa fa-home" aria-hidden="true"></i>
    </a>
  </li>
  <li class="menubar-listitem">
    <a class="menubar-listitem-a" href="regler.php">
      <i class="fa fa-legal" aria-hidden="true"></i>
    </a>
  </li>
  <?php if (isset($gamecount)) { ?>
    <li class="menubar-listitem">
      <a class="menubar-listitem-a" href="kategorier.php">
        <i class="fa fa-envelope" aria-hidden="true"></i>
      </a>
    </li>
  <?php } ?>
  <?php if (isset($gamecount) && $gamecount > 0) { ?>
    <li class="menubar-listitem">
    <a class="menubar-listitem-a" href="spil.php">
      <i class="fa fa-gamepad" aria-hidden="true"></i>
    </a>
  </li>
  <?php } ?>
</ul>
