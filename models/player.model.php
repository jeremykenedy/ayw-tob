<?php
class Player extends Database{
	
	const ALL_FIELDS = "id, user_fk, game_fk, points";

	public function getCurrentPlayer($userId, $gameId){
		$sql = "
				SELECT 
					p.id as id,
					p.user_fk as user_fk,
					p.game_fk as game_fk,
					p.points as points,
					u.username as name,
					u.alignment as alignment
				FROM 
				 	players p
			 	LEFT JOIN
			 		users u
		 		ON
		 			p.user_fk = u.id
			 	WHERE
			 		user_fk = ?
		 		AND
		 			game_fk = ?
		";
		$results = $this->query($sql, array($userId, $gameId));
		return  reset($this->processResults($results));
	}

	public function getAllPlayers($gameId){
		$sql = "
				SELECT 
					p.id as id,
					p.user_fk as user_fk,
					p.game_fk as game_fk,
					p.points as points,
					u.username as name,
					u.alignment as alignment
				FROM 
				 	players p
			 	LEFT JOIN
			 		users u
		 		ON
		 			p.user_fk = u.id
			 	WHERE
			 		game_fk = ?
		";
		$results = $this->query($sql, array($gameId));
		return  $this->processResults($results);
	}

	public function newPlayer($userId, $gameId){
		$sql = "
				INSERT INTO
					players
						(user_fk, game_fk)
				VALUES
					(?, ?)
		";
		$success = $this->execute($sql, array($userId, $gameId));
		return $success;
	}

	public function removePlayer($player, $game){
		$sql = "
				DELETE FROM
					players
				WHERE
					user_fk = ?
				AND
					game_fk = ?
		";
		$success = $this->execute($sql, array($player, $game));
		return $success;
	}

	public function removeAllPlayers($game){
		$sql = "
				DELETE FROM
					players
				WHERE
					game_fk = ?
		";
		$success = $this->execute($sql, array($player, $game));
		return $success;
	}
}
?>