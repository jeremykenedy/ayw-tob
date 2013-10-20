<?php
global $red;

$email = $_POST['email'];

$red->fetchModel('user');
$user = new User();

$emailCheck = reset($user->getByEmail($email));

if ($emailCheck->email){
	if ($red->toolkit->sendResetEmail($emailCheck->email, $emailCheck->username, $emailCheck->id)){
		$return['success'] = 1;
	}
	else {
		$return['success'] = 0;
		$return['message'] = 'unable.to.send.email<br/>please.contact: trust.or.betray@allyourweb.net';
	}
}
else{
	$return['success'] = 0;
	$return['message'] = 'email.not.found';
}

echo json_encode($return);
?>