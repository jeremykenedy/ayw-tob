<?php
global $red;

$red->fetchModel('game');
$game = new Game();
$games = $game->getJoinable();

$return['html'] = '<option value="">select.a.game</option>';
foreach($games as $gme){
	$return['html'] .= '<option value="'.$gme->code.'" selected="selected">'.$gme->name.'</option>';
}
if ($return['html'] != ""){
	$return ['success'] = 1;
}
else {
	$return['success'] = 0;
}

echo json_encode($return);
?>