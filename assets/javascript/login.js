$(document).ready(function(){
	$("#submit_login").on('click', function(e){
		e.preventDefault();
		handleLogin();
	});
});

function handleLogin(){
	var formInfo = $('#login_form').serialize();
	if (validateForm('login_form')){
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
}