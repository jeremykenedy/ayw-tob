<?php
class Game extends Database{
	
	const ALL_FIELDS = "id, code, name, created, status, owner_fk, public";

	public function getAll(){
		$sql = "
				SELECT 
					".$this::ALL_FIELDS."
				 FROM games
		";
		$results = $this->query($sql);
		return  $this->processResults($results);
	}

	public function getJoinable(){
		$sql = "
				SELECT 
					".$this::ALL_FIELDS."
				 FROM 
				 	games
				 WHERE
				 	status = 'waiting'
			 	AND
			 		public = 'public'
		";
		$results = $this->query($sql);
		return  $this->processResults($results);
	}

	public function getById($id){
		$sql = "
				SELECT 
					".$this::ALL_FIELDS."
				 FROM 
				 	games
			 	WHERE 
			 		id = ?
		";
		$results = $this->query($sql, array($id));
		return  reset($this->processResults($results));
	}

	public function getByCode($code){
		$sql = "
				SELECT 
					".$this::ALL_FIELDS."
				 FROM 
				 	games
			 	WHERE 
			 		code = ?
		";
		$results = $this->query($sql, array($code));
		return  reset($this->processResults($results));
	}

	public function getByOwner($userId){
		$sql = "
				SELECT 
					".$this::ALL_FIELDS."
				 FROM 
				 	games
			 	WHERE 
			 		owner_fk = ?
		";
		$results = $this->query($sql, array($userId));
		return  $this->processResults($results);
	}

	public function createNewGame($code, $name, $created, $status, $owner_fk, $public){
		$sql = "
				INSERT INTO
					games
						(code, name, created, status, owner_fk, public)
				VALUES
					(?, ?, ?, ?, ?, ?)
		";
		$success = $this->execute($sql, array($code, $name, $created, $status, $owner_fk, $public));
		return $success;
	}

	public function closeGame($gameId){
		$sql = "
				UPDATE
					games
				SET
					status = 'closed'
				WHERE
					id = ?
		";
		$success = $this->execute($sql, array($gameId));
		return $success;
	}
}