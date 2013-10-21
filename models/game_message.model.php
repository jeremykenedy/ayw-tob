<?php
class Game_message extends Database{
	
	const ALL_FIELDS = "id, game_fk, user_fk, time, message";

	public function getAll($gameId){
		$sql = "
				SELECT 
					gm.id as id,
					gm.game_fk as game_fk,
					gm.user_fk as user_fk,
					gm.time as time,
					gm.message as content,
					u.username as name
				 FROM 
				 	game_messages gm
			 	LEFT JOIN
			 		users u
		 		ON
		 			gm.user_fk = u.id
			 	WHERE
			 		game_fk = ?
		 		ORDER BY
		 			time DESC
		";
		$results = $this->query($sql, array($gameId));
		return  $this->processResults($results);
	}

	public function writeMessage($gameId, $playerId, $message){
		$sql = "
				INSERT INTO
					game_messages
						(game_fk, user_fk, time, message)
				VALUES
					(?, ?, ?, ?)
		";
		$success = $this->execute($sql, array($gameId, $playerId, time(), $message));
		return $success;
	}
}