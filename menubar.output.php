<ul class="menubar-list">
  <li class="menubar-listitem"><a class="menubar-listitem-a" href="index.php">Startside</a></li>
  <li class="menubar-listitem"><a class="menubar-listitem-a" href="kategorier.php">Kategorier</a></li>
  <li class="menubar-listitem"><a class="menubar-listitem-a" href="regler.php">Regler</a></li>
  <?php if (isset($gamecount) && $gamecount > 0) { if(!(isset($showgamelink) && $showgamelink == false)) { ?>
    <li class="menubar-listitem"><a class="menubar-listitem-a" href="spil.php">Gå til spil</a></li>
  <?php }} ?>
</ul>
