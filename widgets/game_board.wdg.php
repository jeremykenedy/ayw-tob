<?php
$page = $red->page;
$user = $red->data->session->user;
$player = $page->data->currentPlayer;
$players = $page->data->players;
$game = $page->data->currentGame;
$host = false;
if ($game->user_fk == $user->id){
	$host = true;
}

?>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="row text-center">
				<h4>round.<?php echo $game->turn;?></h4>
			</div>
			<div class="row">
				<?php
				foreach ($players as $plyr){ 
					if ($plyr->points >= 1){
						$type = 'danger';
					}
					if ($plyr->points >= 3){
						$type = 'warning';
					}
					if ($plyr->points >= 5){
						$type = 'info';
					}
					if ($plyr->points >= 7){
						$type = 'success';
					}

					?>
					<div class="col-mid-4 col-xs-6 text-center">
						<div class="row">
							<h5><?php echo $plyr->name;?></h5>
						</div>
						<div class="row">
							<span class="badge btn-<?php echo $type;?> active"><?php echo $plyr->points;?></span>
						</div>
					</div>
				<?php
				} ?>
			</div>
		</div>
	</div>
</div>