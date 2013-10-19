<?php $page = $red->page; ?>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-xs-12">
			please.fill.out.the.form.below
		</div>
	</div>
</div>
<div class="container">
	<form id="signup_form">
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
				email
			</div>
			<div class="col-md-12 col-xs-12">
				<?php echo $page->formInput('email', 'email', '', array('class' => 'required', 'data-req' => 'email', 'autocomplete' => 'off'));?>
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
				confrim.password
			</div>
			<div class="col-md-12 col-xs-12">
				<?php echo $page->formInput('password', 'conf_password', '', array('class' => 'required', 'data-req' => 'matches', 'data-targetid' => 'password', 'autocomplete' => 'off'));?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<?php echo $page->formInput('submit', 'submit_signup', 'sign.up', array("class" => "btn-primary"));?>
			</div> 		
		</div>
	</form>
</div>