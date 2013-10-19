<?php
global $red;

$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$red->fetchModel('user');
$user = new User();

try {
	$nameCheck = $user->getByUsername($username);
	$emailCheck = $user->getByEmail($email);
	if (count((array)$nameCheck)){
		$return['success'] = 0;
		$return['message'] = 'username.already.in.use';
	}
	elseif (count((array)$emailCheck)){
		$return['success'] = 0;
		$return['message'] = 'email.already.in.use';
	}
	else {	
		$update = $user->createUser($username, $email, $password);
		$return['success'] = 1;
	}
}
catch (Exception $e) {
	$return['success'] = 0;
	$return['message'] = 'error.creating.user';
	$return['error'] = $e->getMessage();
}

echo json_encode($return);
?>