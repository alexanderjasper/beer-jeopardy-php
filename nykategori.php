<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<head>
		<title>Øljeopardy</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	</head>
	<body>
	<p>
		Hej
		<?php 
			$name = $_GET['bruger'];
			echo $name;
		?>.
		Her kan du oprette en ny kategori.
	</p>
	<form action="kategorioprettet.php?bruger=<?php echo $name ?>" method="post">   
			Kategoriens navn:<br>
			<textarea name="kategorinavn" rows="1" cols="28"></textarea><br>
			Svaret til 100 point:<br>
			<textarea name="100pt" rows="3" cols="28"></textarea><br>
			Svaret til 200 point:<br>
			<textarea name="200pt" rows="3" cols="28"></textarea><br>
			Svaret til 300 point:<br>
			<textarea name="300pt" rows="3" cols="28"></textarea><br>
			Svaret til 400 point:<br>
			<textarea name="400pt" rows="3" cols="28"></textarea><br>
			Svaret til 500 point:<br>
			<textarea name="500pt" rows="3" cols="28"></textarea><br>
			<input type="submit" value="Gem"/>
		</form>
		<p>
    		<a href="index.php"><button style="height:50px;width:200px">Log ud</button></a>
		</p>
	</body>
</html>