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

	public function sendMail($to, $subject, $body, $bcc = array()){
		$mail = $this->initializeEmail();
		$mail->addAddress($to);
		$mail->Subject = $subject;
		$mail->Body = $body;
		$mail->IsHTML(true); 
		foreach ($bcc as $recipient){
			$mail->addBCC($recipient);
		}
		try {
			if(!$mail->send()){
				return false;
				//todo integrate monitaur hook
			}
			else {
				return true;
			}
		}
		catch (Exception $e){
			return false;
			//todo integrate monitaur hook
		}
	}

	public function sendResetEmail($email, $username, $id){
		global $red;
		$randomPassword = $this->generateRandomPassword();
		$subject = "password.reset.request";
		$body = '<p> your.password.has.been.reset</p>';
		$body .= '<p>please <a href="http://www.allyourweb.net/tob/login">log-in</a> using.the.following:</p><br/><br/>';
		$body .= "<p>username: $username</p>";
		$body .= "<p>password: <b>$randomPassword</b></p><br/><br/>";
		$body .= "thank.you<br/>trust.or.betray.support<br/>trust.or.betray@allyourweb.net";
		if (!$this->sendMail($email, $subject, $body)){
			return false;
		}
		$red->fetchModel('user');
		$user = new User();
		$user->updateUserWithPassword($id, $username, $email, md5($randomPassword));
		return true;
	}

	public function generateRandomPassword(){
		$optA = array('a', 'c', 'n', 'p', '3', 'z');
		$optB = array('d', 'j', 'q', '1', 'x', 's');
		$optC = array('c', 'q', 'e', '5', 't', 'o');
		$randPass = rand(0,9).$optA[rand(0,max(array_keys($optA)))].rand(4,6).$optB[rand(0,max(array_keys($optB)))].rand(0,9).$optC[rand(0,max(array_keys($optC)))];
		return $randPass;
	}
}

?>