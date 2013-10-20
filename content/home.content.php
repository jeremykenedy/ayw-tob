<?php 
$page = $red->page;
?>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 text-center">
			welcome.to.trust.or.betray - make.your.selection.below
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="jumbotron">
			  <div class="container">
			  	<div class="row text-center">
			  		<div class="col-xs-6">
			    		<?php echo $page->linkTo(array("data-toggle"=> "modal", "href" => "#create_game_modal", 'class' => 'btn btn-success btn-lg '), 'create.game');?>
			    	</div>
		    		<div class="col-xs-6">
			    		<?php echo $page->linkTo(array("id" => "search_games", 'class' => 'btn btn-info btn-lg'), 'join.game');?>
			    	</div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="create_game_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="create_game_form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">create.game</h4>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-md-3 col-xs-12">
                name.this.game
              </div>
              <div class="col-md-9 col-xs-12">
                <?php echo $page->formInput('text', 'game_name', '', array('class' => 'required', 'data-req' => 'exists', 'autocomplete' => 'off'));?>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-3 col-xs-12">
                this.game.is
              </div>
              <div class="col-md-9 col-xs-12">
                <select id="public" name="public">
                	<option value="public">public</option>
                	<option value="private">private</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">nevermind</button>
          <button id="create_button" type="button" class="btn btn-primary">create</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="join_game_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="join_game_form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">join.game</h4>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-md-3 col-xs-12">
                select.a.game
              </div>
              <div class="col-md-9 col-xs-12">
                <select id="join_game" name="join_game">
                	<?php
                	foreach ($page->data->joinable as $game){ ?>
                		<option value="<?php echo $game->code;?>"><?php echo $game->name;?></option>
                	<?php
                	} ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">nevermind</button>
          <button id="join_button" type="button" class="btn btn-primary">join</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
