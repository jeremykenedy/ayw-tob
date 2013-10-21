var updateTimeout;

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

	$("#say_something").on("submit", function(e){
		e.preventDefault();
		writeMessage();
	});

	$("#say_button").on("click", function(){
		writeMessage();
	});
	
	if ($("#game_state").val() == 'waiting'){
		waitingRefresh();	
	}

	$("#start_game").on('click', function(){
		startGame();
	});
	
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

function waitingRefresh(){
	var state = $("#game_state");
	clearTimeout(updateTimeout);
	if (state.val() == 'waiting'){
		$.post(
			$("#url").val()+"scripts/update_waiting.script.php",
			{game: $("#game_id").val(), player: $("#player_id").val()},
			function(data){
				if (data.success == 1){
					$("#players").html(data.playerHtml);
					$("#chat_messages").html(data.messageHtml);
					if (data.state != 'waiting'){
						location.reload();
					}
				}
				state.val(data.state);
				updateTimeout = setTimeout('waitingRefresh()', 2200);
			},
			"json"
		);
	}
	else {
		location.reload();
	}
}

function writeMessage(){
	var message = $("#say_this");
	if (validateForm('say_something')){
		$.post(
			$("#url").val()+"scripts/write_message.script.php",
			{playerId: $("#player_id").val(), gameId: $("#game_id").val(), message: message.val()},
			function(data){
				if (data.success == 1){
					message.val("");
					waitingRefresh();
				}
			},
			"json"
		);
	}
}

function startGame(){
	if ($('#players li').length < 4){
		alert('you.must.have.at.least.4.players');
		return;
	}
	if (confirm('are.you.ready?')){
		$.post(
			$("#url").val()+"scripts/start_game.script.php",
			{game: $("#game_id").val()},
			function(data){
				if (data.success ==1){
					location.reload();
				}
			},
			"json"
		);
	}
}

