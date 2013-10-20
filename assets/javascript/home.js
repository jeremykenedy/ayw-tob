$(document).ready(function(){
	$('#create_game_form').on('submit', function(e){
		e.preventDefault();
		createGame();
	});
	$('#create_game_form #create_button').on('click', function(e){
		e.preventDefault();
		createGame();
	});

	$('#join_game_form #join_button').on('click', function(e){
		e.preventDefault();
		joinGame();
	});

	$("#search_games").on('click', function(){
		updateGameList();
	});
});

function createGame(){
	if (validateForm('create_game_form')){
		$.post(
			$("#url").val()+"scripts/create_game.script.php",
			{name: $("#game_name").val(), is_public: $('#public').val()},
			function(data){
				if (data.success == 1){
					window.location.href = data.gameURL;
				}
				else {
					alert(data.message)
				}
			},
			"json"
		);
	}
}

function joinGame(){
	var game = $("#join_game").val();
	if (game.length < 1){
		updateGameList();
	}
	else{
		$.post(
			$("#url").val()+"scripts/join_game.script.php",
			{code: game},
			function(data){
				if (data.success == 1){
					window.location.href = data.gameURL;
				}
				else {
					alert(data.message);
					updateGameList();
				}
			},
			"json"
		);
	}
}

function updateGameList(){
	$("#join_game_modal").modal("show");
	$.post(
		$("#url").val()+"scripts/update_game_list.script.php",
		{},
		function(data){
			if (data.success == 1){
				$("#join_game").html(data.html);
			}
		},
		"json"
	);
}