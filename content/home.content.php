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
			    		<?php echo $page->linkTo(array('href' => '', 'class' => 'btn btn-primary btn-lg'), 'create.game');?>
			    	</div>
		    		<div class="col-xs-6">
			    		<?php echo $page->linkTo(array('href' => '', 'class' => 'btn btn-primary btn-lg'), 'join.game');?>
			    	</div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</div>