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
});

function closeGame(){
	$.post(
		$("#url").val()+"scripts/close_game.script.php",
		{game: $("#game_id").val()},
		function(data){
			window.location.href = $("#url").val()+"home";
		},
		"json"
	);
}

function quitGame(){
	$.post(
		$("#url").val()+"scripts/quit_game.script.php",
		{player: $("#player_id").val(), game: $("#game_id").val()},
		function(data){
			window.location.href = $("#url").val()+"home";
		},
		"json"
	);
}