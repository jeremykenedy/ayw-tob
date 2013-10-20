<?php
$page = $red->page;
$player = $page->data->currentPlayer;
$game = $page->data->currentGame;
$messages = $page->data->messages;
?>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-xs-12">
			<h4>game.chat</h4>
			<div class="row">
				<form id="say_something">
					<div class="input-group">
				      <span class="input-group-btn">
				        <button id="say_button" class="btn btn-primary" type="button">say</button>
				      </span>
				      <input type="text" id="say_this" name="say_this" class="form-control required" data-req="exists">
				    </div><!-- /input-group -->
				</form>
			</dvi>
			<div id="chat_messages" class="row">
			<?php foreach($messages as $message){ ?>
				<div class="well well-sm">
					<div class="col-xs-3">
						<strong><?php echo date('H:i:s',$message->time);?></strong>
					</div>
					<div class="col-xs-3">
						<?php echo $message->name;?>
					</div>
					<div class="col-xs-6">
						<?php echo $message->content;?>
					</div>
				</div>
			<?php
			} ?>
			</div>
		</div>
	</div>
</div>