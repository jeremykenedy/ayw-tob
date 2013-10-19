var error_color = 'red';
var valid_border_color = '#174c76';
var valid_text_color = '#0b263b';

$(document).ready(function(){
	$("#signout").on('click',function(e){
		$.post(
			"scripts/logout.script.php",
			"",
			function(data){
				if (data.success == 1){
					window.location.href = "login";
				}
			},
			"json"
		);
	})
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
			case 'matches':
				var target = "#"+$(this).attr('data-targetid');
				if ($(this).val() != $(target).val()){
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
			case 'email':
				if (!isValidEmailAddress($(this).val())){
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

/* found at http://stackoverflow.com/questions/2855865/jquery-regex-validation-of-e-mail-address */
function isValidEmailAddress(emailAddress) { 
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};