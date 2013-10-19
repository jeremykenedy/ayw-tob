<?php

class Signup_page extends BasePage{

	public function __construct(){
		global $red;
		parent::__construct();
		
		// Basic Options
		$this->setTemplate("main");
		$this->addStyle("signup");
		$this->addScript("signup");
		$this->pageTitle = "Sign Up";
		$this->name = "Sign Up";

		//Data Sourcing
		//$this->loadModel('event');
		

		// finalize and show
		$this->addContent("signup");
	}

}

?>