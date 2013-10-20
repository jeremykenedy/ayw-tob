var chatTimeout;

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

	$("#say_something").on("submit", function(){
		writeMessage();
	});

	$("#say_buttion").on("click", function(){
		writeMessage();
	});

	playerRefresh();
	stateWatcher();
	refreshChat();
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

function writeMessage(){
	var message = $("#say_this");
	if (validateForm('say_something')){
		$.post(
			$("#url").val()+"scripts/write_message.script.php",
			{playerId: $("#player_id").val(), gameId: $("$game_id").val(), message: message.val()},
			function(data){
				if (data.success == 1){
					message.val("");
					refreshChat();
				}
			},
			"json"
		);
	}
}

function refreshChat(){
	clearTimeout(chatTimeout);
	$.post(
		$("url").val()+"scripts/update_messages.script.php",
		{game: $("#game_id")}
		function(data){
			if (data.success == 1){
				$("#chat_messages").html(data.html);
			}
			chatTimeout = setTimeout("refreshChat()", 2000);
		},
		"json"
	);
}