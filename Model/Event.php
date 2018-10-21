<?php
namespace LeaveFormManagement\Model;

use LeaveFormManagement\Event\EventInterface;
use LeaveFormManagement\Model\AbstractEntity; 


class Event extends AbstractEntity implements EventInterface{
	
	 protected $allowedFields = array('id','eventStartTimeStamp','eventEndTimeStamp','eventName','eventDescription','eventGender','eventStatus');
	 protected $field = array();
   
   public function setId($id){
		 $this->field['id'] = $id;
		 return $this;
   }

   public function getId(){
     return $this->field['id'];
   }
    
	public function setEventName($name){
			$this->field['eventName'] = $name;
			return $this; 
	}

	public function getEventName(){
	    return $this->field['eventName'];
	}

	public function setEventDescription($description){
			$this->field['eventDescription'] = $description;
			return $this;
	}

	public function getEventDescription(){
			return $this->field['eventDescription'];
	}

	public function setEventGender($gender){
			$this->field['eventGender'] = $gender;
			return $this;
	}

	public function getEventGender(){
			return $this->field['eventGender'];
	}

	public function setEventStartTimeStamp($startdatetime){
			$this->field['eventStartTimeStamp'] = $startdatetime;
			return $this;
	}

	public function getEventStartTimeStamp(){
	    return $this->field['eventStartTimeStamp'];
	}

	public function setEventEndTimestamp($enddatetime){
			$this->field['eventEndTimeStamp'] = $enddatetime;
			return $this;
	}

	public function getEventEndTimestamp(){
	    return $this->field['eventEndTimeStamp'];
	}	

	public function getEventstatus(){
			return $this->field['eventStatus'];
	}

	public function setEventStatus($status){
			$this->field['eventStatus'] = $status;
			return $this;
	}
}	

