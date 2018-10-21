<?php

namespace LeaveFormManagement\Controller;

use LeaveFormManagement\Controller\AbstractController;

class EventController extends AbstractController{

	public function __construct(){
		parent::__construct();
	}

	public function Index(){

		$session = $this->getSession();

		$form = $this->getContainer()->get()->get('eventForm')->init();

		$form->fill($_POST);

		$eventname = $form->getInput('eventname')->getValue();

		$eventdescription = $form->getInput('eventdescription')->getValue();

        $eventstatus = $form->getInput('eventstatus')->getValue();

		$eventgender = $form->getInput('eventgender')->getValue();

		$eventstart = $form->getInput('eventstart')->getValue();

		$eventend = $form->getInput('eventend')->getValue();
        
        $manager = $this->getContainer()->get()->get('eventManager');

        $event = $this->getContainer()->get()->get('event');

          
        $event->setId($manager->getNoOfEvents()+1)
            ->setEventName($eventname)
            ->setEventDescription($eventdescription)
            ->setEventGender($eventgender)
            ->setEventStartTimeStamp($eventstart)
            ->setEventEndTimeStamp($eventend)
            ->setEventStatus($eventstatus);
                   
       $manager->addEvent($event); 
    }

    
        
}
