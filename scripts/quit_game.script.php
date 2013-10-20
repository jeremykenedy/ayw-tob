<?php
global $red;

$playerId = $_POST['player'];
$gameId = $_POST['game'];

$red->fetchModel('player');
$player = new Player();

$return['playerId'] = $playerId;
$return['gameId'] = $gameId;

if ($player->removePlayer($playerId, $gameId)){
	$return = array('success' => 1);
	
}

echo json_encode($return);

?>