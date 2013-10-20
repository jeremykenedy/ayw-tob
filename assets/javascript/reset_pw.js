$(document).ready(function(){
	$("#reset_modal #reset_form").on('submit', function(e){
		e.preventDefault();
		handleReset();
	});
	$("#reset_modal #reset_form #reset_button").on('click', function(e){
		e.preventDefault();
		handleReset();
	});
});

function handleReset(){
	if (validateForm('reset_form')){
		$.post(
			"scripts/reset_password.script.php",
			{email: $("#email_reset").val()},
			function(data){
				if (data.success == 1){
					alert("please.check.your.email.for.instructions");
					$("#reset_modal").modal('hide');
				}
				else {
					alert(data.message);
				}
			},
			"json"
		);
	}
}