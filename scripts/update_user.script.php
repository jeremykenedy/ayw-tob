<?php
global $red;
$currentUser = $red->data->session->user; 

$id = $_POST['user_id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$updatePassword = false;
if (strlen($password) > 0){
	$password = md5($password);
	$updatePassword = true;
}

$red->fetchModel('user');
$user = new User();

$nameCheck = array();
if ($username != $currentUser->username){
	$nameCheck = $user->getByUsername($username);	
}
$emailCheck = array();	
if ($email != $currentUser->email){
	$emailCheck = $user->getByEmail($email);	
}
$return['current'] = $currentUser;
try {
	if (count((array)$nameCheck)){
		$return['success'] = 0;
		$return['message'] = 'username.already.in.use';
	}
	elseif (count((array)$emailCheck)){
		$return['success'] = 0;
		$return['message'] = 'email.already.in.use';
	}
	else {
		if ($updatePassword){
			$update = $user->updateUserWithPassword($id, $username, $email, $password);
		}
		else{
			$update = $user->updateUser($id, $username, $email);
		}
		$red->data->session->user->username = $username;
		$red->data->session->user->email = $email;
		$return['username'] = str_replace(' ','.',strtolower($username));
		$return['success'] = 1;
	}

}
catch (Exception $e) {
	$return['success'] = 0;
	$return['message'] = 'Error updating user';
	$return['error'] = $e->getMessage();
}

echo json_encode($return);
?>