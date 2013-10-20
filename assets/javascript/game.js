$(document).ready(function(){
	$("#refresh_list").on('click', function(){
		window.location.reload();
	});

	$("#quit_game").on('click', function(){
		if ($(this).attr('data-owner') == 'yes'){
			if (confirm("this.will.close.this.game\nis.that.ok?")){
				closeGame();
			}
		}
		else {
			if (confirm("quit.this.game?")){
				quitGame();
			}
		}
	});

	playerRefresh();
	stateWatcher();
});

function closeGame(){
	$.post(
		$("#url").val()+"scripts/close_game.script.php",
		{game: $("#game_id").val()},
		function(data){
			if (data.success == 1){
				window.location.href = $("#url").val()+"home";
			}
		},
		"json"
	);
}

function quitGame(){
	$.post(
		$("#url").val()+"scripts/quit_game.script.php",
		{player: $("#player_id").val(), game: $("#game_id").val()},
		function(data){
			if (data.success == 1){
				window.location.href = $("#url").val()+"home";
			}
		},
		"json"
	);
}

function playerRefresh(){
	if ($("#game_state").val() == 'waiting'){
		$.post(
			$("#url").val()+"scripts/update_players.script.php",
			{game: $("#game_id").val()},
			function(data){
				if (data.success == 1){
					$("#players").html(data.html);
				}
				setTimeout('playerRefresh()', 5000);
			},
			"json"
		);
	}
}

function stateWatcher(){
	var state = $("#game_state");
	if ( state.val() == 'waiting'){
		$.post(
			$("#url").val()+"scripts/update_state.script.php",
			{game: $("#game_id").val()},
			function(data){
				if (data.success == 1){
					state.val(data.state);
					if (data.state != 'waiting'){
						location.reload();
					}
				}
				setTimeout('stateWatcher()', 3000);
			},
			"json"
		);
	}
}