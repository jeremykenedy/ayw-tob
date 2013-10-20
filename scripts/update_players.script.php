<?php
global $red;

$gameId = $_POST['game'];

$red->fetchModel('player');
$player = new Player();

$players = $player->getAllPlayers($gameId);

$return['html'] = "";
foreach($players as $plyr){
	$return['html'] .= "<li>".$plyr->name."</li>";
}
if ($return['html'] != ""){
	$return ['success'] = 1;
}
else {
	$return['success'] = 0;
}

echo json_encode($return);
?>