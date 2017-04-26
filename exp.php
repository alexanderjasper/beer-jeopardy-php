<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<title>Øljeopardy</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
	<script src="jquery.dragsort-0.5.2.min.js"></script>
	<script>
	$("#columns,#selected_columns").dragsort({
	dragSelector: "li",
	dragBetween: true,
	dragEnd: saveOrder,
	placeHolderTemplate: "<li class='placeHolder'></li>"
});

function saveOrder() {
	var data = $("#selected_columns li").map(function() {
			return $(this).data("itemid");
	}).get();
	$('#saved_columns').val(data);
}
	</script>
</head>
<body>
	<div>
		<p>
			Velkommen til Øljeopardy!
		</p>
		<p>
			<div>
				<a href="regler.php"><button class="menubutton">Se reglerne</button></a>
			</div>
			<div>
				<a href="logind.php"><button class="menubutton">Log ind</button></a>
			</div>
			<div>
				<a href="nybruger.php"><button class="menubutton">Ny bruger</button></a>
			</div>
		</p>
		<input id='saved_columns' type='hidden' name='TableColumns' />

	<ul class='sortable' id='columns'>
	    <li data-itemid='FirstName'>First Name</li>
	    <li data-itemid='LastName'>Last Name</li>
	    <li data-itemid='DayPhone'>Day Phone</li>
	    <li data-itemid='Email'>Email</li>
	</ul>

	<ul class='sortable' id='selected_columns'>
	</ul>
	</div>
</body>
</html>
