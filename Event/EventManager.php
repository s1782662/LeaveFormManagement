<?php
namespace LeaveFormManagement\Event;

use LeaveFormManagement\Event\EventManagerInterface;
use LeaveFormManagement\Event\EventInterface; 
use LeaveFormManagement\Mapper\EventMapper;
use LeaveFromManagement\Calendar\Calendar;

class EventManager implements EventManagerInterface{
	
  protected $eventmapper;
	
  public function __construct(EventMapper $em){

    $this->eventmapper = $em;
  }

  public function addEvent(EventInterface $event){
      $this->eventmapper->save($event);
  }

  public function getNoOfEvents(){
       return $this->eventmapper->getNoResultantRows($criteria = "1");
  }
    
  public function search(){
       return $this->eventmapper->search("eventStatus = 0");        
  }
  public function getEventById($id){  
      $collection = $this->eventmapper->findById($id);
      return $collection;
  }

  public function getEvents(){
	 $collection = $this->eventmapper->fetchAllRows();
	 return $collection;
  }
  public function DisableEvent(EventInterface $event){
	 if($event->getEventstatus() == 0)
		 throw new EventHandlerException("Event is already Disabled");
				
	 $event->setEventstatus(0);
	 $this->eventmapper->save($event);
  }
  public function UpdateEvent(EventInterface $event){
 	 if($this->eventmapper->save($event) == 1)
  		echo "updated event";
	 else
	    echo "not updated";
				 
   }
  public function DeleteEvent(EventInterface $event){
	 if($this->eventmapper->delete($event) == 1)
 		echo "Deleted";
     else
        echo "Not Deleted";
  }
}
