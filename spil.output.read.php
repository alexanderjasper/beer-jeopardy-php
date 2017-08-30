<!DOCTYPE html>
<html>
<?php include 'preamble.game.html' ?>
<body>
  <div class="screen-text">
    <?php include 'menubar.php';?>
    <h2>Læs op</h2>
    <table style="border: 1px solid black; padding: 10px; width: 50%;" align="center">
      <?php foreach ($thisgame->scoreboard as $score) { ?>
        <tr>
          <td style="width:60%">
            <?php echo $score->name; ?>
          </td>
          <td style="width:40%">
            <?php echo $score->points; ?>
          </td>
        </tr>
      <?php } ?>
    </table>
    <p>
      Din kategori, <i><?php echo $thisgame->jeopardy_category_name; ?></i>, er blevet valgt til <?php echo $thisgame->jeopardy_points; ?> point.
    </p>
    <table align="center" style="width:80%;">
      <tr>
        <th width="50%">Svar</th>
        <th width="50%">Spørgsmål</th>
      </tr>
      <tr>
        <td><?php echo nl2br($thisgame->jeopardy_answer) ?></td>
        <td><?php echo nl2br($thisgame->jeopardy_question) ?></td>
      </tr>
    </table>
    <p>
      <form action=spil.php method=post onsubmit="return confirm('Er du sikker?')">
        <div>
          Hvilken bruger vandt runden?
        </div>
        <select name="roundwinner" class="dropdown" id="selectform">
          <?php foreach ($thisgame->players as $player): ?>
            <option value='<?php echo $player[0] ?>'> <?php echo $player[1] ?> </option>
          <?php endforeach; ?>
        </select>
        <input type="hidden" name="pointswon" value="<?php echo $thisgame->jeopardy_points ?>">
        <input type="hidden" name="categorywon" value="<?php echo $thisgame->jeopardy_game_category_id ?>">
        <div>
          <input type="submit" value="Vælg" class="menubutton" id="selectbutton">
        </div>
      </form>
    </p>
  </div>
</body>
</html>
