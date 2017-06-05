<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="sortable.js"></script>
<script src="jquery.ui.touch-punch.js"></script>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>Øljeopardy</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
	<?php include 'menubar.php';?>
	<div class="screen-text">
		<h1>
			Opret kategori
		</h1>
		<form action="kategorioprettet.php" method="post">
			<div>
				Kategoriens navn:<br>
				<textarea name="categoryname" class="category-edit-name-field"></textarea><br>
			</div>
			<div class="sortableDiv" style="width: 80%">
				<ul id='sortable' class="clean-list">
					<li class="answer-container">
						<img src="move-icon.png" class="answer-image">
						<textarea name="answers[]" class="answer-edit-field"></textarea>
					</li>
					<li class="answer-container">
						<img src="move-icon.png" class="answer-image">
						<textarea name="answers[]" class="answer-edit-field"></textarea>
					</li>
					<li class="answer-container">
						<img src="move-icon.png" class="answer-image">
						<textarea name="answers[]" class="answer-edit-field"></textarea>
					</li>
					<li class="answer-container">
						<img src="move-icon.png" class="answer-image">
						<textarea name="answers[]" class="answer-edit-field"></textarea>
					</li>
					<li class="answer-container">
						<img src="move-icon.png" class="answer-image">
						<textarea name="answers[]" class="answer-edit-field"></textarea>
					</li>
				</ul>
			</div>
			<div class="contentDiv" style="width: 18%">
				<ul class="clean-list">
					<li  class="answer-container">
						<div class="answer-value">
							100
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
		</form>
	</div>
</body>
</html>
