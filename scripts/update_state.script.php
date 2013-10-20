<?php
global $red;

$gameId = $_POST['game'];

$red->fetchModel('game');
$game = new Game();

$state = $game->getById($gameId);

if ($state->status){
	$return['success'] = 1;
	$return['state'] = $state->status;
}
else {
	$return['success'] = 0;
}

echo json_encode($return);
?>