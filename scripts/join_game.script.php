<?php
global $red;

$code = $_POST['code'];

$red->fetchModel('game');
$game = new Game();

$gameCheck = $game->getByCode($code);

if ($gameCheck->status == 'waiting'){
	$return['success'] = 1;
	$return['gameURL'] = 'http://'.SERVER.ROOT_NODE.'game/'.$code;
}

else {
	$return['success'] = 0;
	$return['message'] = "cannot.join.game";
	$return['attempt'] = $gameCheck;
}

echo json_encode($return);
?>