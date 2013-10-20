<?php

class Game_page extends BasePage{

	public function __construct(){
		global $red;
		parent::__construct();
		
		// Basic Options
		$this->setTemplate("main");
		$this->addStyle("game");
		$this->addScript("game");
		$this->pageTitle = "Game";
		$this->name = "Game";

		//Data Sourcing
		$this->loadModel('game');
		$game = new Game();
		$this->data->addProp('currentGame', $game->getByCode($red->getNode(2)));
		$currentGameId = $this->data->currentGame->id;

		$this->loadModel('player');
		$player = new Player();
		
		$currentPlayerId = $red->data->session->user->id;
		$currentPlayer = $player->getCurrentPlayer($currentPlayerId, $currentGameId);
		if (!$currentPlayer->id){
			if ($this->data->currentGame->status != 'playing'){
				$player->newPlayer($currentPlayerId, $currentGameId);
				$currentPlayer = $player->getCurrentPlayer($currentPlayerId, $currentGameId);
			}
		}
		$this->data->addProp('currentPlayer', $currentPlayer);

		$this->data->addProp('players', $player->getAllPlayers($this->data->currentGame->id));
		


		// finalize and show
		$this->addContent("game");
	}

}

?>