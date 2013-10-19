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
		$this->loadModel('event');
		$this->loadModel('action');
		$this->setErrors();
		$this->setAlerts();
		$this->setNotifications();
		// finalize and show
		$this->addContent("home");
	}

	private function setErrors(){
		$data = $this->data;
		$models = $this->models;
		$data->addProp('errorCount', $models->event->getCountType('error'));
		$data->addProp('errors', $models->event->getAllType('error', 'created DESC'));
		foreach ($data->errors as $id => $event){
			$data->errors->{$id}->addProp(
				'actions', 
				new Data(
					array(
						"count" => $models->action->getCountByEvent($id),
						"items" => $models->action->getAllByEvent($id)
					) // close Data params array
				) // close Data call
			); // close addProp call
		} //end foreach
	}

}

?>