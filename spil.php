<?php
include('conn.php');
include('class_lib.php');

$showgamelink = false;

$thisgame = new game($link);

if (isset($_POST['start_game']))
{
	$thisgame->get_game_from_post($_POST);
}
else
{
	$thisgame->get_game_from_cookie();

	if (isset($_POST['choice'])) {
		$thisgame->submit_choice($_POST['choice'], $link);
	}
	if (isset($_POST['roundwinner'])) {
		$thisgame->submit_round_winner($_POST);
	}
	if ($thisgame->player_turn_type == 0) {
		$thisgame->get_turn_holder();
		$thisgame->get_category_owner_points();
	}
}


if ($thisgame->category_count == 0) {
	$thisgame->end();
	include 'spil.output.slut.php';
	exit();
}
if($thisgame->player_turn_type == 0) {
	include 'spil.output.ntur.php';
	exit();
}
if ($thisgame->player_turn_type == 1)
{
	$thisgame->category_chooser();
	include 'spil.output.tur.php';
	exit();
}
if ($thisgame->player_turn_type == 2)
{
	$thisgame->category_reader();
	include 'spil.output.read.php';
	exit();
}

?>
