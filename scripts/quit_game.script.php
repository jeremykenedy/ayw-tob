<?php
global $red;

$playerId = $_POST['player'];
$gameId = $_POST['game'];

$red->fetchModel('player');
$player = new Player();

$player->removePlayer($playerId, $gameId);

$return = array('success' => 1);

echo json_encode($return);
?>