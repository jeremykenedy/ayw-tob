<?php $page = $red->page; ?>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-xs-12">
			Please Log-in Below
		</div>
	</div>
</div>
<div class="container">
	<form id="login_form">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				Username
			</div>
			<div class="col-md-12 col-xs-12">
				<?php echo $page->formInput('text', 'username', '', array('class' => 'required', 'data-req' => 'exists'));?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				Password
			</div>
			<div class="col-md-12 col-xs-12">
				<?php echo $page->formInput('password', 'password', '', array('class' => 'required', 'data-req' => 'exists'));?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<?php echo $page->linkTo(array("href" => "signup"), 'Create Account');?>
			</div>
			<div class="col-md-12 col-xs-12">
				<?php echo $page->linkTo(array("href" => "resetpw"), 'Forgot Password');?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<?php echo $page->formInput('submit', 'submit_login', 'Log-In', array("class" => "btn-primary"));?>
			</div> 		
		</div>
	</form>
</div>