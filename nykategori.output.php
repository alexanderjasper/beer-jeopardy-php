<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="sortable.js"></script>
<script src="jquery.ui.touch-punch.js"></script>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<title>Øljeopardy</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
	<div class="screen-text">
		<?php include 'menubar.php';?>
		<h2>
			Opret kategori
		</h2>
		<form action="kategorioprettet.php" method="post">
			<div>
				Kategoriens navn:<br>
				<textarea name="categoryname" class="category-edit-name-field"></textarea><br>
			</div>
			<div class="contentDiv">
				<ul class="clean-list">
					<li class="answer-container">
						<div class="answer-value">
							<i class="fa fa-exclamation exclamation-mark"></i>
							100
							<i class="fa fa-question question-mark"></i>
						</div>
					</li>
					<li class="answer-container">
						<div class="answer-value">
							<i class="fa fa-exclamation exclamation-mark"></i>
							200
							<i class="fa fa-question question-mark"></i>
						</div>
					</li>
					<li class="answer-container">
						<div class="answer-value">
							<i class="fa fa-exclamation exclamation-mark"></i>
							300
							<i class="fa fa-question question-mark"></i>
						</div>
					</li>
					<li class="answer-container">
						<div class="answer-value">
							<i class="fa fa-exclamation exclamation-mark"></i>
							400
							<i class="fa fa-question question-mark"></i>
						</div>
					</li>
					<li class="answer-container">
						<div class="answer-value">
							<i class="fa fa-exclamation exclamation-mark"></i>
							500
							<i class="fa fa-question question-mark"></i>
						</div>
					</li>
				</ul>
			</div>
			<div class="sortableDiv">
				<ul id='sortable' class="clean-list">
					<li class="answer-container">
						<div class="answer-textarea-container">
							<div>
								<textarea name="answers[]" class="answer-edit-field top"></textarea>
							</div>
							<div>
								<textarea name="answers[]" class="answer-edit-field bottom"></textarea>
							</div>
						</div>
						<div class="answer-image-container">
							<i class="fa fa-bars fa-fw answer-image"></i>
						</div>
					</li>
					<li class="answer-container">
						<div class="answer-textarea-container">
							<div>
								<textarea name="answers[]" class="answer-edit-field top"></textarea>
							</div>
							<div>
								<textarea name="answers[]" class="answer-edit-field bottom"></textarea>
							</div>
						</div>
						<div class="answer-image-container">
							<i class="fa fa-bars fa-fw answer-image"></i>
						</div>
					</li>
					<li class="answer-container">
						<div class="answer-textarea-container">
							<div>
								<textarea name="answers[]" class="answer-edit-field top"></textarea>
							</div>
							<div>
								<textarea name="answers[]" class="answer-edit-field bottom"></textarea>
							</div>
						</div>
						<div class="answer-image-container">
							<i class="fa fa-bars fa-fw answer-image"></i>
						</div>
					</li>
					<li class="answer-container">
						<div class="answer-textarea-container">
							<div>
								<textarea name="answers[]" class="answer-edit-field top"></textarea>
							</div>
							<div>
								<textarea name="answers[]" class="answer-edit-field bottom"></textarea>
							</div>
						</div>
						<div class="answer-image-container">
							<i class="fa fa-bars fa-fw answer-image"></i>
						</div>
					</li>
					<li class="answer-container">
						<div class="answer-textarea-container">
							<div>
								<textarea name="answers[]" class="answer-edit-field top"></textarea>
							</div>
							<div>
								<textarea name="answers[]" class="answer-edit-field bottom"></textarea>
							</div>
						</div>
						<div class="answer-image-container">
							<i class="fa fa-bars fa-fw answer-image"></i>
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
