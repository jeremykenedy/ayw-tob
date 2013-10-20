<?php

class Home_page extends BasePage{

	public function __construct(){
		global $red;
		parent::__construct();
		
		// Basic Options
		$this->setTemplate("main");
		$this->addStyle("home");
		$this->addScript("home");
		$this->pageTitle = "Home";
		$this->name = "Home Page";

		//Data Sourcing
		$this->loadModel('game');
		$game = new Game();
		$this->data->addProp('joinable', $game->getJoinable());

		// finalize and show
		$this->addContent("home");
	}

}

?>