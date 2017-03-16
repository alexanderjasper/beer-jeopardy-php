<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="10">
<head>
  <title>Kontrolpanel</title>
  <script src="jquery-1.10.2.min.js"></script>
  <script>
		/* AJAX request to checker */
		function check(){
			$.ajax({
				type: 'POST',
				url: 'turcheck.php',
				dataType: 'json',
				data: data
			}).done(function( response ) {
				/* update counter */
				if(response == true){
					window.location.reload();
				}
			});
		}
		//Every 2 sec check if there is new update
		setInterval(check,2000);
	</script>
</head>
<body>
  <p>Hej <?php echo $name ?>. Det er ikke din tur.</p>
  <div>
    <a href="index.php"><button style="height:50px;width:200px">Til startsiden</button></a>
  </div>
</body>
</html>
