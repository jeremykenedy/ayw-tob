<?php
global $red;

$gameId = $_POST['game'];

$red->fetchModel('player');
$player = new Player();
$players = $player->getAllPlayers($gameId);
$return['playerHtml'] = "";
foreach($players as $plyr){
	$return['playerHtml'] .= "<li>".$plyr->name."</li>";
}

$red->fetchModel('game');
$game = new Game();
$state = $game->getById($gameId);
$return['state'] == "";
if ($state->status){
	$return['state'] = $state->status;
}

$red->fetchModel('game_message');
$message = new Game_message();
$messages = $message->getAll($gameId);
$return['messageHtml'] = "";
foreach ($messages as $msg){
	$return['messageHtml'] .=	'<div class="well well-sm">';
	$return['messageHtml'] .=		date('H:i:s', $msg->time).' - '.$msg->name.' - '.$msg->content;
	$return['messageHtml'] .=	'</div>';
}

if ($return['state'] != "" && $return['playerHtml'] != ""){
	$return['success'] = 1;
}
else {
	$return['success'] = 0;
}

echo json_encode($return);
?>