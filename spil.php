<?php
include('conn.php');
include('class_lib.php');

$thisgame = new game();

if (isset($_POST['start_game']))
{
	$thisgame->get_game_from_post($_POST);
}
else
{
	$thisgame->get_game_from_cookie();
	if (isset($_POST['choice']))
	{
		$thisgame->submit_choice($_POST['choice']);
	}
}


// Determine game categories
$sql4 = mysqli_query($link,
	"SELECT spilkategori.kategoriid,spilkategori.spilkategoriid,kategori.navn
	FROM spilkategori
	INNER JOIN kategori
	ON spilkategori.kategoriid=kategori.kategoriid
	WHERE spilkategori.spilid='$thisgame->game_id'
	AND deltagerid!=$thisgame->participant_id");
if(!$sql4)
{
	$error = 'Kunne ikke finde spilkategorier.' . mysqli_error($link);
	include 'error.html.php';
	exit();
}
$categories = array();
while ($row = mysqli_fetch_array($sql4, MYSQLI_ASSOC))
{
	$categories[] = array($row['kategoriid'],$row['spilkategoriid'],$row['navn']);
}

foreach ($categories as $cat)
{
	$sql100 = mysqli_query($link, "SELECT vundet100 FROM spilkategori WHERE spilkategoriid='$cat[1]'");
	$row1 = mysqli_fetch_array($sql100);
	$vundet100 = $row1['vundet100'];
	$sql200 = mysqli_query($link, "SELECT vundet200 FROM spilkategori WHERE spilkategoriid='$cat[1]'");
	$row2 = mysqli_fetch_array($sql200);
	$vundet200 = $row2['vundet200'];
	$sql300 = mysqli_query($link, "SELECT vundet300 FROM spilkategori WHERE spilkategoriid='$cat[1]'");
	$row3 = mysqli_fetch_array($sql300);
	$vundet300 = $row3['vundet300'];
	$sql400 = mysqli_query($link, "SELECT vundet400 FROM spilkategori WHERE spilkategoriid='$cat[1]'");
	$row4 = mysqli_fetch_array($sql400);
	$vundet400 = $row4['vundet400'];
	$sql500 = mysqli_query($link, "SELECT vundet500 FROM spilkategori WHERE spilkategoriid='$cat[1]'");
	$row5 = mysqli_fetch_array($sql500);
	$vundet500 = $row5['vundet500'];
}

if (isset($_POST['roundwinner']))
{
	$roundwinner = $_POST['roundwinner'];
	$pointswon = $_POST['pointswon'];
	$categorywon = $_POST['categorywon'];

	if ($pointswon == 100) {$sqlpoints = 'vundet100';}
	if ($pointswon == 200) {$sqlpoints = 'vundet200';}
	if ($pointswon == 300) {$sqlpoints = 'vundet300';}
	if ($pointswon == 400) {$sqlpoints = 'vundet400';}
	if ($pointswon == 500) {$sqlpoints = 'vundet500';}

	$sqlregisterwinner = mysqli_query($link, "UPDATE spilkategori SET $sqlpoints='$roundwinner' WHERE spilkategoriid='$categorywon'");
	$sqlchangewinnertur = mysqli_query($link, "UPDATE deltager SET tur=1 WHERE deltagerid='$roundwinner'");
	$sqlchangeplayertur = mysqli_query($link, "UPDATE deltager SET tur=0 WHERE deltagerid='$thisgame->participant_id'");
	$thisgame->player_turn_type = 0;
}

// Get turn holder
$sql = mysqli_query($link,
	"SELECT bruger.navn,spil.latestchooser,kategori.navn as kategorinavn,deltager.tur
	FROM deltager
		JOIN spil ON deltager.spilid=spil.spilid
		JOIN bruger ON deltager.brugerid=bruger.brugerid
		JOIN spilkategori ON spilkategori.deltagerid=deltager.deltagerid
		JOIN kategori ON spilkategori.kategoriid=kategori.kategoriid
	WHERE spil.spilid='$thisgame->game_id' AND deltager.tur!='0'");
$row = mysqli_fetch_assoc($sql);
$turnholder = $row['navn'];
$latestchooser = $row['latestchooser'];
$turnholdercategory = $row['kategorinavn'];
$turntype = $row['tur'];

// Get selected category and owner
$sql = mysqli_query($link,
	"SELECT kategori.navn,spil.point,bruger.navn as brugernavn
	FROM spil
		JOIN spilkategori ON spil.spilkategoriid=spilkategori.spilkategoriid
		JOIN kategori ON spilkategori.kategoriid=kategori.kategoriid
		JOIN bruger ON kategori.brugerid=bruger.brugerid
	WHERE spil.spilid='$thisgame->game_id'");
$row = mysqli_fetch_assoc($sql);
$selectedcategory = $row['navn'];
$selectedcategoryowner = $row['brugernavn'];
$selectedpoint = $row['point'];

$sql = mysqli_query($link, "SELECT count(*) as count FROM spilkategori WHERE spilid='$thisgame->game_id' AND (vundet100 IS NULL OR vundet200 IS NULL OR vundet300 IS NULL OR vundet400 IS NULL OR vundet500 IS NULL)");
$row = mysqli_fetch_assoc($sql);
$catcount = $row['count'];

$showgamelink = false;
if ($catcount == 0) {
	mysqli_query($link, "UPDATE spil SET status='inaktiv' WHERE spilid='$thisgame->game_id'");
	include 'spil.output.slut.php';
	exit();
}
else{
	if($thisgame->player_turn_type == 0)
	{
		include 'spil.output.ntur.php';
		exit();
	}
	if ($thisgame->player_turn_type == 1)
	{
		$sql = mysqli_query($link, "SELECT count(*) as count FROM spilkategori WHERE spilid='$thisgame->game_id'");
		$row = mysqli_fetch_array($sql);
		$count = $row['count'];
		$_SESSION['count'] = $count;

		$lastcatowner = false;
		if($catcount == 1 && $count > 1)
		{
			$sql = mysqli_query($link, "SELECT deltagerid FROM spilkategori WHERE spilid='$thisgame->game_id' AND (vundet100 IS NULL OR vundet200 IS NULL OR vundet300 IS NULL OR vundet400 IS NULL OR vundet500 IS NULL)");
			$row = mysqli_fetch_assoc($sql);
			if ($row['deltagerid'] == $thisgame->participant_id)
			{
				$lastcatowner = true;
			}
			if ($lastcatowner == true)
			{
				$sql = mysqli_query($link,
					"SELECT spilkategori.kategoriid,spilkategori.spilkategoriid,kategori.navn
					FROM spilkategori
					INNER JOIN kategori
					ON spilkategori.kategoriid=kategori.kategoriid
					WHERE spilkategori.spilid='$thisgame->game_id'
					AND deltagerid=$thisgame->participant_id");
				$row = mysqli_fetch_assoc($sql);
				$categories = array();
				$categories[0] = array($row['kategoriid'],$row['spilkategoriid'],$row['navn']);
			}
		}
		include 'spil.output.tur.php';
		exit();
	}
	if ($thisgame->player_turn_type == 2)
	{
		$sqljeopardypoint = mysqli_query($link, "SELECT point FROM spil WHERE spilid='$thisgame->game_id'");
		$rowjeopardypoint = mysqli_fetch_assoc($sqljeopardypoint);
		$jeopardypoint = $rowjeopardypoint['point'];

		if ($jeopardypoint == 100)
		{
			$sqljeopardyans = mysqli_query($link,
			"SELECT kategori.100point as answer, kategori.navn as name, spilkategori.spilkategoriid as spilcatid
			FROM kategori
				JOIN spilkategori ON kategori.kategoriid=spilkategori.kategoriid
				JOIN spil ON spilkategori.spilkategoriid=spil.spilkategoriid
			WHERE spil.spilid='$thisgame->game_id'");
		}
		if ($jeopardypoint == 200)
		{
			$sqljeopardyans = mysqli_query($link,
			"SELECT kategori.200point as answer, kategori.navn as name, spilkategori.spilkategoriid as spilcatid
			FROM kategori
				JOIN spilkategori ON kategori.kategoriid=spilkategori.kategoriid
				JOIN spil ON spilkategori.spilkategoriid=spil.spilkategoriid
			WHERE spil.spilid='$thisgame->game_id'");
		}
		if ($jeopardypoint == 300)
		{
			$sqljeopardyans = mysqli_query($link,
			"SELECT kategori.300point as answer, kategori.navn as name, spilkategori.spilkategoriid as spilcatid
			FROM kategori
				JOIN spilkategori ON kategori.kategoriid=spilkategori.kategoriid
				JOIN spil ON spilkategori.spilkategoriid=spil.spilkategoriid
			WHERE spil.spilid='$thisgame->game_id'");
		}
		if ($jeopardypoint == 400)
		{
			$sqljeopardyans = mysqli_query($link,
			"SELECT kategori.400point as answer, kategori.navn as name, spilkategori.spilkategoriid as spilcatid
			FROM kategori
				JOIN spilkategori ON kategori.kategoriid=spilkategori.kategoriid
				JOIN spil ON spilkategori.spilkategoriid=spil.spilkategoriid
			WHERE spil.spilid='$thisgame->game_id'");
		}
		if ($jeopardypoint == 500)
		{
			$sqljeopardyans = mysqli_query($link,
			"SELECT kategori.500point as answer, kategori.navn as name, spilkategori.spilkategoriid as spilcatid
			FROM kategori
				JOIN spilkategori ON kategori.kategoriid=spilkategori.kategoriid
				JOIN spil ON spilkategori.spilkategoriid=spil.spilkategoriid
			WHERE spil.spilid='$thisgame->game_id'");
		}
		$rowjeopardyans = mysqli_fetch_assoc($sqljeopardyans);
		$jeopardyans = $rowjeopardyans['answer'];
		$jeopardycatname = $rowjeopardyans['name'];
		$jeopardyspilcatid = $rowjeopardyans['spilcatid'];

		$sqlplayers = mysqli_query($link,
			"SELECT deltager.deltagerid as deltagerid, bruger.navn as navn
			FROM deltager JOIN bruger ON deltager.brugerid=bruger.brugerid
			WHERE deltager.spilid='$thisgame->game_id'
			AND deltager.brugerid != '$thisgame->user_id'");
		$players = array();
		while ($row = mysqli_fetch_array($sqlplayers, MYSQLI_ASSOC))
		{
			$players[] =  array($row['deltagerid'],$row['navn']);
		}
		include 'spil.output.read.php';
		exit();
	}
}

?>
