$(document).ready(function(){
	$("#submit_signup").on('click', function(e){
		e.preventDefault();
		handleSignup();
	});
});

function handleSignup(){
	var formInfo;
	formInfo = $('#signup_form').serialize();
	if (validateForm('signup_form')){
		$.post(
			"scripts/create_user.script.php",
			formInfo,
			function(data){
				if (data.success==1){
					alert("Your account has been successfully created");
					$.post(
						"scripts/login.script.php",
						formInfo,
						function(data){
							if (data.success == 1){
								window.location.href = "home";
							}
						},
						"json"
					);
				}
				else{
					alert(data.message);
				}
			},
			"json"
		);
	}
}