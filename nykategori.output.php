<!DOCTYPE html>
<html>
<?php include 'preamble.html' ?>
<body>
	<div class="screen-text">
		<?php include 'menubar.php';?>
		<h4>
			Opret kategori
		</h4>
		<form action="kategorier.php" method="post">
			<div>
				Kategoriens navn:<br>
				<textarea name="categoryname" class="category-edit-name-field"></textarea><br>
			</div>
			<div class="category-edit-container">
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
			</div>
			<div class="category-edit-submit-button">
				<input type="submit" value="Gem" class="menubutton">
			</div>
			<input type="hidden" name="createcat" value="create">
		</form>
	</div>
</body>
</html>
