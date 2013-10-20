<?php
global $red;

$gameId = $_POST['game'];

$red->fetchModel('player');
$player = new Player();

$player->removeAllPlayers($gameId);

$red->fetchModel('game');
$game = new Game();

$game->closeGame($gameId);

$return = array('success' => 1);

echo json_encode($return);
?>