<?php

class Login_page extends BasePage{

	public function __construct(){
		global $red;
		parent::__construct();
		
		// Basic Options
		$this->setTemplate("main");
		$this->addStyle("login");
		$this->addScript("login");
		$this->pageTitle = "Log-In";
		$this->name = "Log-In";

		//Data Sourcing
		//$this->loadModel('event');
		

		// finalize and show
		$this->addContent("login");
	}

}

?>