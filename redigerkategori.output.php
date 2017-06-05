<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="sortable.js"></script>
<script src="jquery.ui.touch-punch.js"></script>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>Øljeopardy</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
	<?php include 'menubar.php';?>
	<div class="screen-text">
		<h1>
			Rediger kategori
		</h1>
		<form action="kategoriredigeret.php" method="post">
			<div>
				Kategoriens navn:<br>
				<textarea name="categoryname" class="category-edit-name-field"><?php echo $category[0] ?></textarea><br>
			</div>
			<div class="sortableDiv" style="width: 80%">
				<ul id='sortable' class="clean-list">
					<li class="answer-container">
						<img src="move-icon.png" class="answer-image">
						<textarea name="answers[]" class="answer-edit-field"><?php echo $category[1] ?></textarea>
					</li>
					<li class="answer-container">
						<img src="move-icon.png" class="answer-image">
						<textarea name="answers[]" class="answer-edit-field"><?php echo $category[2] ?></textarea>
					</li>
					<li class="answer-container">
						<img src="move-icon.png" class="answer-image">
						<textarea name="answers[]" class="answer-edit-field"><?php echo $category[3] ?></textarea>
					</li>
					<li class="answer-container">
						<img src="move-icon.png" class="answer-image">
						<textarea name="answers[]" class="answer-edit-field"><?php echo $category[4] ?></textarea>
					</li>
					<li class="answer-container">
						<img src="move-icon.png" class="answer-image">
						<textarea name="answers[]" class="answer-edit-field"><?php echo $category[5] ?></textarea>
					</li>
				</ul>
			</div>
			<div class="contentDiv" style="width: 18%">
				<ul class="clean-list">
					<li>
						<div class="answer-container">
							<div class="answer-value">
								100
							</div>
						</div>
					</li>
					<li class="answer-container">
						<div class="answer-value">
							200
						</div>
					</li>
					<li class="answer-container">
						<div class="answer-value">
							300
						</div>
					</li>
					<li class="answer-container">
						<div class="answer-value">
							400
						</div>
					</li>
					<li class="answer-container">
						<div class="answer-value">
							500
						</div>
					</li>
				</ul>
			</div>
			<div>
				<input type="submit" value="Gem" class="menubutton">
			</div>
			<input type="hidden" name="editcat" value="<?php echo $editcat ?>">
		</form>
	</div>
</body>
</html>
