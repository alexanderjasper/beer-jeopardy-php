<?php
include('conn.php');

if (isset($_POST['Submit']))
{
	$_SESSION['katid'] = $_POST['katid'];
	$_SESSION['bruger'] = $_POST['bruger'];
	$_SESSION['spilid'] = $_POST['spilid'];
	$_SESSION['deltager'] = $_POST['deltager'];
}

if (isset($_SESSION['userid']))
{
	$uid = mysqli_real_escape_string($link, $_SESSION['userid']);
}
if (isset($_SESSION['spilid']))
{
	$sid = mysqli_real_escape_string($link, $_SESSION['spilid']);
}
if (isset($_SESSION['bruger']))
{
	$name = mysqli_real_escape_string($link, $_SESSION['bruger']);
}
else
{
	$sql = mysqli_query($link, "SELECT navn FROM bruger WHERE brugerid='$uid'");
	$row = mysqli_fetch_assoc($sql);
	$name = $row['navn'];
}
if (isset($_SESSION['deltager'], $_SESSION['katid']))
{
	$delt = mysqli_real_escape_string($link, $_SESSION['deltager']);
	$kid = mysqli_real_escape_string($link, $_SESSION['katid']);
}
else
{
	$sql = mysqli_query($link,
	"SELECT deltager.deltagerid as delt, spilkategori.kategoriid as kid
	FROM deltager
	JOIN spilkategori ON deltager.deltagerid=spilkategori.deltagerid
	WHERE deltager.brugerid='$uid'
	AND deltager.spilid='$sid'");
	$row = mysqli_fetch_assoc($sql);
	$delt = $row['delt'];
	$_SESSION['deltager'] = $delt;
	$kid = $row['kid'];
	$_SESSION['katid'] = $kid;
}

if(!$delt)
{
	$error = 'Kunne ikke finde deltagerid: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}
if(!$name)
{
	$error = 'Kunne ikke finde brugernavn: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}
if(!$sid)
{
	$error = 'Kunne ikke finde spilid: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}
if(!$kid)
{
	$error = 'Kunne ikke finde kategoriid: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

if (isset($_POST['newgame']))
{
	$isnew = mysqli_real_escape_string($link, $_POST['newgame']);
}
else
{
	$isnew = false;
}
if($isnew == true)
{
	$sql = mysqli_query($link, "INSERT INTO spilkategori (kategoriid,spilid,deltagerid,vundet100,vundet200,vundet300,vundet400,vundet500) VALUES ('$kid','$sid','$delt',NULL,NULL,NULL,NULL,NULL)");
}

//Points calculation:
$sql100points = mysqli_query($link, "SELECT COUNT(*) as count FROM spilkategori WHERE spilid='$sid' AND vundet100='$delt'");
$row100p = mysqli_fetch_assoc($sql100points);
$p100 = $row100p['count'];
$sql200points = mysqli_query($link, "SELECT COUNT(*) as count FROM spilkategori WHERE spilid='$sid' AND vundet200='$delt'");
$row200p = mysqli_fetch_assoc($sql200points);
$p200 = $row200p['count'];
$sql300points = mysqli_query($link, "SELECT COUNT(*) as count FROM spilkategori WHERE spilid='$sid' AND vundet300='$delt'");
$row300p = mysqli_fetch_assoc($sql300points);
$p300 = $row300p['count'];
$sql400points = mysqli_query($link, "SELECT COUNT(*) as count FROM spilkategori WHERE spilid='$sid' AND vundet400='$delt'");
$row400p = mysqli_fetch_assoc($sql400points);
$p400 = $row400p['count'];
$sql500points = mysqli_query($link, "SELECT COUNT(*) as count FROM spilkategori WHERE spilid='$sid' AND vundet500='$delt'");
$row500p = mysqli_fetch_assoc($sql500points);
$p500 = $row500p['count'];
$userpoints = 100*$p100+200*$p200+300*$p300+400*$p400+500*$p500;


if (isset($_POST['spilcatchoice']) and isset($_POST['pointchoice']))
{
	$spilcatchoice = $_POST['spilcatchoice'];
	$pointchoice = $_POST['pointchoice'];
	$catchoicesql = mysqli_query($link, "SELECT kategoriid FROM spilkategori WHERE spilkategoriid='$spilcatchoice'");
	$catchoicerow = mysqli_fetch_assoc($catchoicesql);
	$catchoice = $catchoicerow['kategoriid'];

	$sqlupd1 = mysqli_query($link, "UPDATE spil SET spilkategoriid='$spilcatchoice', point='$pointchoice', aktivtidspunkt=NOW() WHERE spilid='$sid'");
	$sqlupd2 = mysqli_query($link, "UPDATE deltager SET tur='0' WHERE deltagerid='$delt'");
	$catdeltagersql = mysqli_query($link,
		"SELECT deltagerid
		FROM spilkategori
		WHERE spilkategoriid='$spilcatchoice'");
	$catdeltagerrow = mysqli_fetch_assoc($catdeltagersql);
	$catdeltager = $catdeltagerrow['deltagerid'];
	$updatecatdeltagersql = mysqli_query($link, "UPDATE deltager SET tur='2' where deltagerid='$catdeltager'");
}

$sql2 = mysqli_query($link, "SELECT tur FROM deltager WHERE deltagerid='$delt'");
$row2 = mysqli_fetch_assoc($sql2);
$tur = $row2['tur'];
$_SESSION['tur'] = $tur;

if(!$sql2)
{
	$error = 'Kunne ikke finde status.' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

// Kode til at finde status:
$sql3 = mysqli_query($link, "SELECT status FROM spil WHERE spilid='$sid'");
$row3 = mysqli_fetch_assoc($sql3);
$status = $row3['status'];
if(!$sql3)
{
	$error = 'Kunne ikke finde status.' . mysqli_error($link);
	include 'error.html.php';
	exit();
}

$sql4 = mysqli_query($link,
	"SELECT spilkategori.kategoriid,spilkategori.spilkategoriid,kategori.navn
	FROM spilkategori
	INNER JOIN kategori
	ON spilkategori.kategoriid=kategori.kategoriid
	WHERE spilkategori.spilid='$sid'
	AND deltagerid!=$delt");
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
	$sqlchangeplayertur = mysqli_query($link, "UPDATE deltager SET tur=0 WHERE deltagerid='$delt'");
	$tur = 0;
}

$sql = mysqli_query($link, "SELECT count(*) as count FROM spilkategori WHERE spilid='$sid' AND (vundet100 IS NULL OR vundet200 IS NULL OR vundet300 IS NULL OR vundet400 IS NULL OR vundet500 IS NULL)");
$row = mysqli_fetch_assoc($sql);
$catcount = $row['count'];

if ($catcount == 0) {
	mysqli_query($link, "UPDATE spil SET status='inaktiv' WHERE spilid='$sid'");
	include 'spil.output.slut.php';
}
else{
	if($tur == 0)
	{
		include 'spil.output.ntur.php';
	}
	if ($tur == 1)
	{
		$sql = mysqli_query($link, "SELECT count(*) as count FROM spilkategori WHERE spilid='$sid'");
		$row = mysqli_fetch_array($sql);
		$count = $row['count'];
		$_SESSION['count'] = $count;

		$lastcatowner = false;
		if($catcount == 1 && $count > 1)
		{
			$sql = mysqli_query($link, "SELECT deltagerid FROM spilkategori WHERE spilid='$sid' AND (vundet100 IS NULL OR vundet200 IS NULL OR vundet300 IS NULL OR vundet400 IS NULL OR vundet500 IS NULL)");
			$row = mysqli_fetch_assoc($sql);
			if ($row['deltagerid'] == $delt)
			{
				$lastcatowner = true;
			}
			$sql = mysqli_query($link,
				"SELECT spilkategori.kategoriid,spilkategori.spilkategoriid,kategori.navn
				FROM spilkategori
				INNER JOIN kategori
				ON spilkategori.kategoriid=kategori.kategoriid
				WHERE spilkategori.spilid='$sid'
				AND deltagerid=$delt");
			$row = mysqli_fetch_assoc($sql);
			$categories = array();
			$categories[0] = array($row['kategoriid'],$row['spilkategoriid'],$row['navn']);
		}
		include 'spil.output.tur.php';
	}
	if ($tur == 2)
	{
		$sqljeopardypoint = mysqli_query($link, "SELECT point FROM spil WHERE spilid='$sid'");
		$rowjeopardypoint = mysqli_fetch_assoc($sqljeopardypoint);
		$jeopardypoint = $rowjeopardypoint['point'];

		if ($jeopardypoint == 100)
		{
			$sqljeopardyans = mysqli_query($link,
			"SELECT kategori.100point as answer, kategori.navn as name, spilkategori.spilkategoriid as spilcatid
			FROM kategori
				JOIN spilkategori ON kategori.kategoriid=spilkategori.kategoriid
				JOIN spil ON spilkategori.spilkategoriid=spil.spilkategoriid
			WHERE spil.spilid='$sid'");
		}
		if ($jeopardypoint == 200)
		{
			$sqljeopardyans = mysqli_query($link,
			"SELECT kategori.200point as answer, kategori.navn as name, spilkategori.spilkategoriid as spilcatid
			FROM kategori
				JOIN spilkategori ON kategori.kategoriid=spilkategori.kategoriid
				JOIN spil ON spilkategori.spilkategoriid=spil.spilkategoriid
			WHERE spil.spilid='$sid'");
		}
		if ($jeopardypoint == 300)
		{
			$sqljeopardyans = mysqli_query($link,
			"SELECT kategori.300point as answer, kategori.navn as name, spilkategori.spilkategoriid as spilcatid
			FROM kategori
				JOIN spilkategori ON kategori.kategoriid=spilkategori.kategoriid
				JOIN spil ON spilkategori.spilkategoriid=spil.spilkategoriid
			WHERE spil.spilid='$sid'");
		}
		if ($jeopardypoint == 400)
		{
			$sqljeopardyans = mysqli_query($link,
			"SELECT kategori.400point as answer, kategori.navn as name, spilkategori.spilkategoriid as spilcatid
			FROM kategori
				JOIN spilkategori ON kategori.kategoriid=spilkategori.kategoriid
				JOIN spil ON spilkategori.spilkategoriid=spil.spilkategoriid
			WHERE spil.spilid='$sid'");
		}
		if ($jeopardypoint == 500)
		{
			$sqljeopardyans = mysqli_query($link,
			"SELECT kategori.500point as answer, kategori.navn as name, spilkategori.spilkategoriid as spilcatid
			FROM kategori
				JOIN spilkategori ON kategori.kategoriid=spilkategori.kategoriid
				JOIN spil ON spilkategori.spilkategoriid=spil.spilkategoriid
			WHERE spil.spilid='$sid'");
		}
		$rowjeopardyans = mysqli_fetch_assoc($sqljeopardyans);
		$jeopardyans = $rowjeopardyans['answer'];
		$jeopardycatname = $rowjeopardyans['name'];
		$jeopardyspilcatid = $rowjeopardyans['spilcatid'];

		$sqlplayers = mysqli_query($link,
			"SELECT deltager.deltagerid as deltagerid, bruger.navn as navn
			FROM deltager JOIN bruger ON deltager.brugerid=bruger.brugerid
			WHERE deltager.spilid='$sid'
			AND deltager.brugerid != '$uid'");
		$players = array();
		while ($row = mysqli_fetch_array($sqlplayers, MYSQLI_ASSOC))
		{
			$players[] =  array($row['deltagerid'],$row['navn']);
		}

		include 'spil.output.read.php';
	}
}

?>
