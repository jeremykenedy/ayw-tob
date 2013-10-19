<?php

class Profile_page extends BasePage{

	public function __construct(){
		global $red;
		parent::__construct();
		
		// Basic Options
		$this->setTemplate("main");
		$this->addStyle("profile");
		$this->addScript("profile");
		$this->pageTitle = "Profile";
		$this->name = "Profile";

		//Data Sourcing
		//$this->loadModel('event');
		

		// finalize and show
		$this->addContent("profile");
	}

}

?>