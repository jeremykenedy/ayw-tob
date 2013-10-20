<?php
class User extends Database{
	
	const ALL_FIELDS = "id, username, email, password";

	public function getAll(){
		$sql = "
				SELECT 
					".$this::ALL_FIELDS."
				 FROM users
		";
		$results = $this->query($sql);
		return  $this->processResults($results);
	}

	public function getUser($username, $password){
		$sql = "
				SELECT
					".$this::ALL_FIELDS."
				 FROM users
				 WHERE username = ?
				 AND password = ?
		";
		$results = $this->query($sql, array($username, md5($password)));
		return  reset($this->processResults($results));
	}
	
	public function getById($id){
		$sql = "
				SELECT
					".$this::ALL_FIELDS."
				 FROM users
				 WHERE id = ?
		";
		$results = $this->query($sql, array($id));
		return  reset($this->processResults($results));
	}

	public function getByUsername($username){
		$sql = "
				SELECT
					".$this::ALL_FIELDS."
				 FROM users
				 WHERE username = ?
		";
		$results = $this->query($sql, array($username));
		return  reset($this->processResults($results));
	}

	public function getByEmail($email){
		$sql = "
				SELECT
					".$this::ALL_FIELDS."
				 FROM users
				 WHERE email = ?
		";
		$results = $this->query($sql, array($email));
		return reset($this->processResults($results));
	}

	public function updateUser($id, $username, $email){
		$sql = "
			UPDATE users
			SET username = ?,
			email = ?
			WHERE id = ?
		";
		$results = $this->execute($sql, array($username, $email, $id));
		return $results;
	}

	public function updateUserWithPassword($id, $username, $email, $password){
		$sql = "
			UPDATE users
			SET username = ?,
			email = ?,
			password = ?
			WHERE id = ?
		";
		$results = $this->execute($sql, array($username, $email, $password, $id));
		return $results;
	}

	public function createUser($username, $email, $password){
		$sql = "
			INSERT INTO users
			(username, email, password) 
			VALUES (?, ?, ?);
		";
		$results = $this->execute($sql, array($username, $email, $password));
		return $results;
	}
}
?>