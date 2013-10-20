<?php
global $red;

$gameId = $_POST['game'];

$red->fetchModel('game_message');
$message = new Game_message();
$messages = $message->getAll($gameId);

$return['html'] = "";
foreach ($messages as $msg){
	$return['html'] .= '<div class="well well-sm">';
	$return['html'] .=	 '<div class="col-xs-3">';
	$return['html'] .=	  '<strong>'.date('H:i:s',$msg->time).'></strong>';
	$return['html'] .=	 '</div>';
	$return['html'] .=	 '<div class="col-xs-3">';
	$return['html'] .=	   $msg->name;
	$return['html'] .=	 '</div>';
	$return['html'] .=	 '<div class="col-xs-6">';
	$return['html'] .=	   $msg->content;
	$return['html'] .=	 '</div>';
	$return['html'] .= '</div>';
}
if ($return['html'] != ""){
	$return['success'] = 1;	
}
else {
	$return['success'] = 0;
}

echo json_encode($return);

?>