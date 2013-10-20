<?php
global $red;

$player = $_POST['player'];
$game = $_POST['game'];

$red->fetchObject('player');
$player = new Player();

$player->removePlayer($player, $game);

$return = array('success' => 1);

echo json_encode($return);
?>