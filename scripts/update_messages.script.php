<?php
global $red;

$gameId = $_POST['game'];

$red->fetchModel('game_message');
$message = new Game_message();
$messages = $message->getAll($gameId);
$return['messageHtml'] = "";
foreach ($messages as $msg){
	$return['messageHtml'] .=	'<div class="well well-sm">';
	$return['messageHtml'] .=		date('H:i:s', $msg->time).' - '.$msg->name.' - '.$msg->content;
	$return['messageHtml'] .=	'</div>';
}

echo json_encode($return);

?>