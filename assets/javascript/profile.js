$(document).ready(function(){
	$("#submit_update").on('click', function(e){
		e.preventDefault();
		handleLogin();
	});
});

function handleLogin(){
	var formInfo = $('#profile_form').serialize();
	if (validateForm('profile_form')){
		$.post(
			"scripts/update_user.script.php",
			formInfo,
			function(data){
				if (data.success == 1){
					alert('information.updated');
					$("#greeting_text").text("hello."+data.username);
				}
				else {
					alert(data.message);
				}
			},
			"json"
		);
	}
}