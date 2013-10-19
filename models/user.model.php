<?php
class User extends Database{
	
	const ALL_FIELDS = "id, username, password";

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
		return  $this->processResults($results);
	}
	
	public function getById($id){
		$sql = "
				SELECT
					".$this::ALL_FIELDS."
				 FROM users
				 WHERE id = ?
		";
		$results = $this->query($sql, array($id));
		return  $this->processResults($results);
	}

	public function getByUsername($username){
		$sql = "
				SELECT
					".$this::ALL_FIELDS."
				 FROM users
				 WHERE username = ?
		";
		$results = $this->query($sql, array($username));
		return  $this->processResults($results);
	}

	public function updateUser($id, $username){
		$sql = "
			UPDATE users
			SET username = ?
			WHERE id = ?
		";
		$results = $this->execute($sql, array($username, $id));
		return $results;
	}

	public function updateUserWithPassword($id, $display, $username, $access, $password){
		$sql = "
			UPDATE users
			SET username = ?,
			password = ?
			WHERE id = ?
		";
		$results = $this->execute($sql, array($username, $password, $id));
		return $results;
	}

	public function createUser($username, $password){
		$sql = "
			INSERT INTO users
			(username, password) 
			VALUES (?, ?,);
		";
		$results = $this->execute($sql, array($username, $password));
		return $results;
	}
}
?>