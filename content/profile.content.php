<?php 
$page = $red->page; 
$user = $red->data->session->user; 
?>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-xs-12">
			update.your.info.below
		</div>
	</div>
</div>
<div class="container">
	<form id="profile_form">
		<?php echo $page->formInput('hidden', 'user_id', $user->id);?>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				username
			</div>
			<div class="col-md-12 col-xs-12">
				<?php echo $page->formInput('text', 'username', $user->username, array('class' => 'required', 'data-req' => 'exists', 'autocomplete' => 'off'));?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				email
			</div>
			<div class="col-md-12 col-xs-12">
				<?php echo $page->formInput('email', 'email', $user->email, array('class' => 'required', 'data-req' => 'email', 'autocomplete' => 'off'));?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				password
			</div>
			<div class="col-md-12 col-xs-12">
				<?php echo $page->formInput('password', 'password', '', array('autocomplete' => 'off'));?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				confrim.password
			</div>
			<div class="col-md-12 col-xs-12">
				<?php echo $page->formInput('password', 'conf_password', '', array('autocomplete' => 'off'));?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<?php echo $page->formInput('submit', 'submit_update', 'update', array("class" => "btn-primary"));?>
			</div> 		
		</div>
	</form>
</div>