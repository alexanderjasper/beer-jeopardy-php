<ul class="menubar">
  <li><a href="startside.php">Startside</a></li>
  <li><a href="kategorier.php">Kategorier</a></li>
  <li><a href="regler.php">Regler</a></li>
  <?php if (isset($gamecount) && $gamecount > 0) { if(!(isset($showgamelink) && $showgamelink == false)) { ?>
    <li><a href="spil.php">Gå til spil</a></li>
  <?php }} ?>
</ul>
