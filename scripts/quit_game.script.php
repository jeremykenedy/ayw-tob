<?php
global $red;

$playerId = $_POST['player'];
$gameId = $_POST['game'];

$red->fetchModel('player');
$player = new Player();
$player->removePlayer($playerId, $gameId);
$red->fetchModel('game_message');
	$message = new Game_message();
	$message->writeMessage($gameId, $playerId, '**left.the.game**');

$return = array('success' => 1);
echo json_encode($return);

?>