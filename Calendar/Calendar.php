<?php
namespace LeaveFormManagement\Calendar;


use \DateTime;
use LeaveFormManagement\Calendar\InterfaceCalendar;
use LeaveFormManagement\Model\Config;
use LeaveFormManagement\Session\Session;
use LeaveFormManagement\Model\LeaveForm;
use LeaveFormManagement\Exception\UnexpectedFormatException;

class Calendar implements InterfaceCalendar{

	const DEFAULT_TIMEZONE = 'Asia/kolkata';
	const DEFAULT_FORMAT = 'Y-m-d H:i:s a';

	protected $timezone = self::DEFAULT_TIMEZONE; 
	protected $datetimeformat = self::DEFAULT_FORMAT;
	protected $config;
	protected $leavefrom; 
	protected $leaveto;
	protected $timeFrom;
	protected $timeTo;
	protected $weekdayleavetimefrom; 
	protected $weekdayleavetimeto;
	protected $weekendleavetimefrom;
	protected $weekendleavetimeto;
	protected $weekdays = array('Monday','Tuesday','Wednesday','Thursday','Friday');
	protected $weekends = array('Sunday','Saturday');

	public function __construct(){}


	public function setDependencyClasses(Config $config ,LeaveForm $leaveform){
      
      $this->config = $config;
      $this->leaveform = $leaveform;
      return $this;
    }

	public function setGenderTimeFrom($value){
        
      $this->timeFrom = $value;
	  return $this;
	}
	 
	public function getGenderTimeFrom(){
        
      return $this->timeFrom;
	}

	public function getGenderTimeTo(){
       
       return $this->timeTo;
	}

	public function setGenderTimeTo($value){
      
      $this->timeTo = $value;
	  return $this;
	} 
			
    public function setLeaveDateTimeFrom($value){
  
      $this->leavefrom = $value; 
	  return $this;
	}

	public function setLeaveDateTimeTo($value){
  
      $this->leaveto = $value;
	  return $this;
	}

    public function setDateTimeFormat($from,$to){
      if(is_string($from) && is_string($to)){
      
        if( $this->isValidDateTimeString($from) && $this->isValidDateTimeString($to) ){
           
           if(($from = new \DateTime($from)) && ($to = new \DateTime($to))){
   
                $this->setLeaveDateTimeFrom($from)->setLeaveDateTimeTo($to);
            }else{ 

                 throw new UnexpectedFormatException('Invalid DateTime strings');
            }

        }else{
            throw new UnexpectedFormatException('Not a valid date');
        } 

      }else{
			  throw new  UnexpectedFormatException('Invalid DateTime Timestamps');

      }

    }

	public function isValidDateTimeString($datetimestring){

     $date = new \DateTime($datetimestring);
  	 return ($date && DateTime::getLastErrors()["warning_count"] == 0 && 
         DateTime::getLastErrors()["error_count"] == 0);
	}

	public function isInvalidInterval(){

	  if(!(convertToTimestamp($this->leaveto) <= convertToTimestamp($this->leavefrom))){
 	  	 return true;     

       }else{
  	     throw new UnexpectedFormatException('Check From date and To date  shouldn\'t be less');
	   } 
	 }
	 
	
	public function TimestampToDate($timestamp){

		if(!is_int($timestamp)){

			  throw new UnexpectedFormatException('Not a Timestamp : Invalid integer ');
		}

		return date($this->datetimeformat, $timestamp);
	}
	 
	public function issameday(){
      
        if($this->leavefrom->format('Y m d') == $this->leaveto->format('Y m d')) {
     
           if($this->isweekday()){
   
               $this->setGenderTimeFrom($this->config->weekdayleavetimefrom,$this->config->weekdayleavetimeto);		
               $this->leaveform->setLevel($this->processleavedates($this->getGenderTimeFrom(),$this->getGenderTimeTo())); 

           }else if($this->isweekend()){

               $this->setGenderTimeFrom($this->config->weekendleavetimefrom,$this->config->weekendleavetimeto);
               $this->leaveform->setLevel($this->processleavedates($this->getGenderTimeFrom(),$this->getGenderTimeTo()));

           }else{
               throw new UnexpectedFormatException('Not able to decide whether a weekday or weeekend');

           }

        }else{
           // throw new UnexpectedFormatException('This is not a weekday');
         return false;
      }
    }

    public function processleavedates($from,$to){
   
	   $datefrom = $this->leavefrom->format('d-M-Y').$from;
	   $from = new \DateTime($datefrom);
	   $dateto = $this->leaveto->format('d-M-Y').$to;
	   $to = new \DateTime($dateto);

       if(($this->leavefrom->getTimestamp() >= $from->getTimestamp()) && ($this->leaveto->getTimestamp() <= $to->getTimestamp())  ){
		      return "1";
       }else if(($this->leavefrom->getTimestamp() >= $from->getTimestamp()) && ($this->leaveto->getTimestamp() >= $to->getTimestamp())  ){
		      return "2";
       }else if(($this->leavefrom->getTimestamp() <= $from->getTimestamp()) && ($this->leaveto->getTimestamp() <= $to->getTimestamp())  ){
		      return "3";
       }else if(($this->leavefrom->getTimestamp() <= $from->getTimestamp()) && ($this->leaveto->getTimestamp() >= $to->getTimestamp())  ){
		      return "4";
       }else{
		      return "5";
       }

	}
	public function isweekday(){
        
      if((in_array($this->leavefrom->format('l'), $this->weekdays))){
		   return true;
	  }else{
		   return false;
	  }  
	}

	public function isweekend(){
      if((in_array($this->leavefrom->format('l'), $this->weekends))){
	     return true; 
	  }else{
		  return false;
	  } 
    }

    public function isNumberOfDays(){

	  $diff_hours = $this->leaveto->diff($this->leavefrom)->h;

      $diff_days = $this->datetimeto->diff($time2)->days;

	  if(($diff_days < 7) || ($diff_days == 7 && $diff_hours == 0)){
		     return true;
	  }else{
		  return false;
	  }
    }

   public function noOfHoursLate($date1,$date2){

     $d1 = new DateTime($date1);

     $d2 = new DateTime($date2);

     $diff = $d1->diff($d2);

     return $diff->h;
   }


   public function convertTimeTo24Hours(){
     
     $this->leaveform->setExitOn($this->leavefrom->format('Y-m-d H:i:s'));
     $this->leaveform->setEntryOn($this->leaveto->format('Y-m-d H:i:s'));
   
     return $this;
   }

   public function convertTimeTo12Hours(){
     
     $this->leavefrom->format('Y-m-d h:i:s a');
     $this->leaveto->format('Y-m-d h:i:s a');
   }
 
   public function checkForEvent($eventfrm,$evto){
    
     $eventfrom = new DateTime($eventfrm);
  	 $eventto = new DateTime($evto);
  
     if(($this->leavefrom->getTimestamp() >= $eventfrom->getTimestamp()) && ($this->leaveto->getTimestamp() <= $eventto->getTimestamp())  )
 	 	return 1;
 	 else
 	 	return 0; 
   } 

}
