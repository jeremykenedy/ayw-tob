<?php
global $red;

$gameId = $_POST['game'];

$red->fetchModel('game');
$game = new Game();
$game->updateStatus($gameId, 'playing');

$red->fetchModel('game_message');
$message = new Game_message();
$message->writeMessage($gameId, $red->data->session->user->id, '**- started.the.game -**');

$return['success'] = 1;
echo json_encode($return);
?>