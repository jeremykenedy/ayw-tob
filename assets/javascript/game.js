$(document).ready(function(){
	$("#refresh_list").on('click', function(){
		window.location.reload();
	});

	$("#quit_game").on('click', function(){
		if (confirm("this.will.remove.this.game\nis.that.ok?")){
			closeGame();
		}
	});
});

function closeGame(){

}