<?php
global $red;
$username = $_POST['username'];
$password = $_POST['password'];
$authenticated = 0;

$red->fetchModel('user');
$user = new User();
$attempt = $user->getUser($username, $password);

if (isset($attempt->username)){
	$attempt->addProp('authenticated', 1);
	$red->setSessionProp('user', $attempt);
	$return['success'] = 1;	
	$red->logEvent(
		SERVER.ROOT_NODE, 
		'notification', 
		'User has logged in', 
		array(
			"user" => $attempt->username,
			"time" => time()
		)
	);
}
else {
	$return['success'] = 0;
	$return['message'] = 'incorrect.username.or.password';
}


echo json_encode($return);
?>
