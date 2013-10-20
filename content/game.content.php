<?php
$page = $red->page;
$game = $page->data->currentGame;
$player = $page->data->currentPlayer;
$players = $page->data->players;

$owner = 'no';
if ($plaery->id == $game->owner_fk){
	$owner = 'yes';
}

?>
<input type="hidden" id="player_id" value="<?php echo $player->id;?>"/>
<input type="hidden" id="game_id" value="<?php echo $game->id;?>" />
<?php 
if ($game->status == 'waiting'){ ?>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-xs-12">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="row">
							<strong>Players</strong>
						</div>
						<div class="row">
							<ol id="players">
							<?php
							foreach ($players as $plyr){ ?>
								<li><?php echo $plyr->name;?></li>
							<?php
							}?>
							</ol>
						</div>
						<div class="row visible-xs visible-sm"></div>
						<div class="row">
							<span id="refresh_list" class="col-xs-6 col-xs-offset-3 btn btn-info btn-sm">refresh</span>
						</div>
						<div class="row visible-xs visible-sm"></div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="row">
							<span id="start_game" class="col-xs-6 col-md-12 btn btn-success btn-lg">start</span>
						</div>
						<div class="row visible-xs visible-sm">
						</div>
						<div class="row">
							<span id="quit_game" data-owner="<?php echo $owner;?>" class="col-xs-6 col-md-12 btn btn-danger btn-lg">quit</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}

if ($game->status == 'closed'){ ?>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-xs-12">
				<h2>game.closed.by.host</h2>
			</div>
		</div>
	</div>
<?php
}?>





<?php $red->show($page->data); ?>