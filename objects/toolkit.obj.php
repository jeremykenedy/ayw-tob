<?php

/**
*
* This class is a place to put all those nifty tricks that can help make life easier somewhere down the road
* Keep in mind, if something is in here, it must truly be globally applicable. If I see a phormatPhoneNumber() or
* something like that in here I'm going to punch someone in the phace. srsly.
*
*/

class Toolkit {
	
	/** 
	* This function takes a string and a limit to how many characters you want then trucates it to that amount and
	* adds the ellipsis at the end.
	*
	* It does account for spaces, so it won't chop a word in half. "Tell them to admire my assembly skills"
	* implies a much different meaning when it gets chopped to "Tell them to admire my ass..."
	* ... but you can tell them to. I'd understand.
	* @param <string> $string - The string you want chopped
	* @param <int> $length - how short you want it (remember to account for the ...)
	*/

	public function truncateString($string, $length){
	    if (strlen($string) > $length) {
	        $string = substr($string,0,($length - 3));
	        $string = substr($string,0,strrpos($string,' ')).'...';
	    }
	    return $string;
	}

	public function initializeEmail(){
		require_once('PHPMailerAutoload.php');

		$mail = new PHPMailer(true);

		$mail->isSMTP();                                      	// Set mailer to use SMTP
		$mail->Host = SMTP_HOST;  								// Specify main and backup server
		$mail->SMTPAuth = true;                             	// Enable SMTP authentication
		$mail->Username = SMTP_USER;                            // SMTP username
		$mail->Password = SMTP_PASS;                           	// SMTP password
		$mail->SMTPSecure = 'tls';                           	// Enable encryption, 'ssl' also accepted

		$mail->From = MAIL_FROM;
		$mail->FromName = MAIL_FROM_NAME;

		return $mail;
	}
}

?>