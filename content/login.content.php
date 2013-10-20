<?php $page = $red->page; ?>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-xs-12">
			please.log-in.below
		</div>
	</div>
</div>
<div class="container">
	<form id="login_form">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				username
			</div>
			<div class="col-md-12 col-xs-12">
				<?php echo $page->formInput('text', 'username', '', array('class' => 'required', 'data-req' => 'exists', 'autocomplete' => 'off'));?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				password
			</div>
			<div class="col-md-12 col-xs-12">
				<?php echo $page->formInput('password', 'password', '', array('class' => 'required', 'data-req' => 'exists', 'autocomplete' => 'off'));?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<?php echo $page->linkTo(array("href" => "signup"), 'create.account');?>
			</div>
			<div class="col-md-12 col-xs-12">
				<?php echo $page->linkTo(array("data-toggle"=> "modal", "href" => "#reset_modal"), 'forgot.password');?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<?php echo $page->formInput('submit', 'submit_login', 'log-in', array("class" => "btn-primary"));?>
			</div> 		
		</div>
	</form>
</div>
<?php $red->widget('reset_pw'); ?>
