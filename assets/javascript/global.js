var error_color = 'red';
var valid_border_color = '#174c76';
var valid_text_color = '#0b263b';

$(document).ready(function(){

});

function validateForm(formId){
	var valid = true;
	$("#"+formId+" .required").each(function(){
		switch($(this).attr('data-req')){
			case 'exists':
				if ($(this).val().length < 1){
					valid = false
					$(this)
						.css({
							border: '1px solid '+error_color,
							color: error_color
						});
				}
				else {
					$(this)
						.css({
							border: '1px solid '+valid_border_color,
							color: valid_text_color
						});
				}
				break;
		}
	});
	return valid;
}