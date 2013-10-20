<?php
global $red;

$playerId = $_POST['playerId'];
$gameId = $_POST['gameId'];
$content = $_POST['message'];

$red->fetchModel('game_message');
$message = new Game_message();
$message->writeMessage($gameId, $playerId, $content);

$return = array('success' => 1);
echo json_encode($return);

?>