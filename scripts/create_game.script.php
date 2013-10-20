<?php
global $red;

$name = $_POST['name'];
$public = $_POST['is_public'];
$owner_fk = $red->data->session->user->id;
$created = time();
$code = md5($created);
$status = 'waiting';

$red->fetchModel('game');
$game = new Game();

$created = $game->createNewGame($code, $name, $created, $status, $owner_fk, $public);

if ($created){
	$return['success'] = 1;
	$return['gameURL'] = 'http://'.SERVER.ROOT_NODE.'game/'.$code;
}

else {
	$return['success'] = 0;
	$return['message'] = "error.creating.game";
}

echo json_encode($return);
?>