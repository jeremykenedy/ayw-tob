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
			    		<?php echo $page->linkTo(array("data-toggle"=> "modal", "href" => "#create_game_modal", 'class' => 'btn btn-primary btn-lg'), 'create.game');?>
			    	</div>
		    		<div class="col-xs-6">
			    		<?php echo $page->linkTo(array("data-toggle"=> "modal", "href" => "#join_game_modal", 'class' => 'btn btn-primary btn-lg'), 'join.game');?>
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
                <?php echo $page->formInput('text', 'name', '', array('class' => 'required', 'data-req' => 'exists', 'autocomplete' => 'off'));?>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
          <button id="reset_button" type="button" class="btn btn-primary">reset.password</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->