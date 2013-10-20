<?php

include('config.php');
//figure out what my root I'm working with is
$root = str_replace('index.php','',str_replace('\\','/',__FILE__));

include($root.'/objects/red.obj.php');
$red = new Red();
$mail = $red->toolkit->initializeEmail();
$mail->addAddress('tattedweazel@gmail.com');
$mail->Subject = 'Test Mail';
$mail->Body = 'testing';
try {
	if(!$mail->send()){
		echo 'error sending mail';
	}
	else {
		echo 'mail sent';
		echo '<pre>';
		print_r($mail);
		echo '</pre>';

	}
}
catch (Exception $e){
	echo '<pre>';
	print_r($e);
	echo '</pre>';
}
if ($red->data->session->user->authenticated){
	$page = $red->router();
}
else {
	switch($red->getNode(1)){
		case 'signup':
			$page = 'signup';
			break;
		default: 
			$page = 'login';
			break;
	}
}
$red->loadPage($page);

?>
