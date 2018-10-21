<?php
namespace LeaveFormManagement\Controller;

use LeaveFormManagement\Model\LeaveForm;
use LeaveFormManagement\Mapper\ConfigMapper;
use LeaveFormManagement\Model\Config;
use LeaveFormManagement\View\View;
use LeaveFormManagement\View\CompositeView;

class LeaveFormController extends AbstractController{

  public function leaveController(){

    $session =  $this->getSession();

    $form = $this->getContainer()->get()->get('LeaveInputForm');

    $form->init()->fill($_POST); 

    $from = $form->getInput('startdate')->getValue()." ".$form->getInput('starttime')->getValue();

    $to = $form->getInput('enddate')->getValue()." ".$form->getInput('endtime')->getValue();

    $address = $form->getInput('visiting')->getValue();
    
    $purpose = $form->getInput('purpose')->getValue();

    $configmapper = $this->getContainer()->get()->get('ConfigMapper');

    $leaveform = $this->getContainer()->get()->get('LeaveForm');

    $user = $session->get('user');

    $hostel = $this->getContainer()->get()->get('HostelMapper');

    $studentdetails = $hostel->findById($user->id);

    
    $leaveform->setName($user->name)
          ->setId($user->id)
          ->setPlace($address)
          ->setExitOn($from)
          ->setEntryOn($to)
          ->setApprovedByWardenId($studentdetails->wardenid)
          ->setApprovedByProctorId($studentdetails->proctorid)
          ->setLeaveStatus('0')
          ->setWardenStatus('0')
          ->setProctorStatus('0')
          ->setProctorPermission('0')
          ->setWardenPermission('1')
          ->setWardenAppDispp('0')
          ->setProctorAppDispp('0')
          ->setPurpose($purpose);

    $config = $configmapper->findById('male');

    $calendar = $this->getContainer()->get()->get('Calendar');


    
    $calendar->setDependencyClasses($config,$leaveform);

    $calendar->setDateTimeFormat($from,$to);
    
    if(!$calendar->issameday()){      
    
        $eventManager = $this->getContainer()->get()->get('eventManager');      
        $events = $eventManager->search();
        foreach($events as $event){
           if(!$calendar->checkForEvent($event->getEventStartTimeStamp(),$event->getEventEndTimeStamp())){
               $leaveform->setProctorPermission('1');
               $leaveform->setProctorStatus('0');
           }
            
        }
    }
    
    $calendar->convertTimeTo24hours();

    $leavemapper = $this->getContainer()->get()->get('LeaveMapper');

    $leavemapper->save($leaveform);

    header('Location:../LeaveFormManagement/status');
    
  }

  public function leaveStatusController(){
    $session = $this->getSession();

    $user = $session->get('user');

    $leavemapper = $this->getContainer()->get()->get('LeaveMapper');

    $leaveform = $leavemapper->findById($user->id);

    $session->offsetUnset('results');

    $session->add('results',$leaveform);

    header('Location:../LeaveFormManagement/leavestatus');
  }


  public function deleteLeaveForm(){

    $session = $this->getSession();

    $user = $session->get('user');

    $leavemapper = $this->getContainer()->get()->get('LeaveMapper');

    $leaveform = $leavemapper->findById($user->id);
    
    if($leaveform == 0){
      echo "No LeaveForms are applied on this id";
    }

    $row = $leavemapper->delete($leaveform);

    if($row == 1){
      header('Location:../LeaveFormManagement/home');
    }
  }

  public function getUnapprovedLeaveForms(){

    $session = $this->getSession();

    $user = $session->get('user');
    
    $view = $this->getContainer()->get()->get('View');
    
    $composite = $this->getContainer()->get()->get('composite');
		
    $leavemapper = $this->getContainer()->get()->get('LeaveMapper');
    
    $collection = $this->getContainer()->get()->get('EntityMap');
    
   
    $results = $leavemapper->search("wardenStatus = 0 and approvedByWardenId = '$user->id' limit  10");

		if($results == null){
			$leave = new View('approve');
				$leave->render();
				exit();
		}

		$collection->addCollection('leaveform',$results);
		
		$results = $collection->getCollection('leaveform');

    $leaveforms = $results->toArray();

    $header = new View('header');

		
		$composite->attachView($header);
			
		foreach($leaveforms as $leaveform){
				$body = new View('body');
				$body->setFields($leaveform->toArray());
				
				$composite->attachView($body);
		}
		
		$footer = new View('footer');
		$composite->attachView($footer);
		$composite->render();					   
  
   }
   
  public function getApprovedLeaveForms(){

    $session = $this->getSession();
    $user = $session->get('user');
		$view = $this->getContainer()->get()->get('View');
		$composite = $this->getContainer()->get()->get('composite');
		
		$leavemapper = $this->getContainer()->get()->get('LeaveMapper');
		$collection = $this->getContainer()->get()->get('EntityMap');

		$results = $leavemapper->search("wardenStatus = 1 and  approvedByWardenId = '$user->id' limit  10");

		if($results == null){
				$leave = new View('approve');
				$leave->render();
				exit();
		}

		$collection->addCollection('leaveform',$results);		
		
		$results = $collection->getCollection('leaveform');
		
		$leaveforms = $results->toArray();
		
		$header = new View('app_header');

		
		$composite->attachView($header);
			
		foreach($leaveforms as $leaveform){
				$body = new View('app_body');
				$body->setFields($leaveform->toArray());
				
				$composite->attachView($body);
		}
		
		$footer = new View('footer');
		$composite->attachView($footer);
		$composite->render();					   
 		  
   }
   
  public function getProctorApprovedLeaveForms(){

    $session = $this->getSession();
    $user = $session->get('user');
    
    $view = $this->getContainer()->get()->get('View');

    $composite = $this->getContainer()->get()->get('composite');
 
    $leavemapper = $this->getContainer()->get()->get('LeaveMapper');
    
    $collection = $this->getContainer()->get()->get('EntityMap');

    $results = $leavemapper->search("proctorStatus = 1 and proctorPermission = 1 and approvedByProctorId = '$user->id' limit 10");

	if($results == null){
			$leave = new View('proctorNoLeaveapp');
			$leave->render();
		exit();
	}

	$collection->addCollection('leaveform',$results);		
	
	$results = $collection->getCollection('leaveform');
		
	$leaveforms = $results->toArray();
		
	$header = new View('app_proc_header');
		
    $composite->attachView($header);
			
	foreach($leaveforms as $leaveform){
		$body = new View('app_proc_body');
		$body->setFields($leaveform->toArray());
				
		$composite->attachView($body);
	}
		
	$footer = new View('proc_footer');
	$composite->attachView($footer);
	$composite->render();					   
 		  
   }
   
  public function getProctorUnapprovedLeaveForms(){

    $session = $this->getSession();

    $user = $session->get('user');
    
    $view = $this->getContainer()->get()->get('View');
    
    $composite = $this->getContainer()->get()->get('composite');
		
	$leavemapper = $this->getContainer()->get()->get('LeaveMapper');
    
    $collection = $this->getContainer()->get()->get('EntityMap');
    
   
    $results = $leavemapper->search("proctorStatus = 0 and proctorPermission = 1 and approvedByProctorId = '$user->id' limit  10");

 	if($results == null){
		$leave = new View('proctorNoLeaveapp');
		$leave->render();
 		exit();
	 }

	$collection->addCollection('leaveform',$results);
	
	$results = $collection->getCollection('leaveform');

    $leaveforms = $results->toArray();

    $header = new View('proc_header');
		
	$composite->attachView($header);
			
	foreach($leaveforms as $leaveform){
			$body = new View('proc_body');
			$body->setFields($leaveform->toArray());
			$composite->attachView($body);
	}
	
	$footer = new View('proc_footer');
	$composite->attachView($footer);
	$composite->render();					   

   }

  public function setApproveToLeaveForm(){

      $username = $_POST['regno'];
      $leavemapper = $this->getContainer()->get()->get('LeaveMapper');

      $leaveform = $leavemapper->search("id = '$username'");

      foreach($leaveform as $leave){
        if($leave->getWardenPermission() == 1 && $leave->getProctorPermission() == 0){
             if($leave->getWardenStatus() == 0){
                 $leave->setWardenStatus('1');
                 $leave->setWardenAppDispp('1');
                  $leave->setLeaveStatus('1');
                  $leavemapper->save($leave);
                  echo "1";
			   }
          }else if($leave->getWardenPermission() == 1 && $leave->getProctorPermission() == 1){
                  if($leave->getProctorStatus() == 1 && $leave->getProctorAppDispp() == 1){
                      $leave->setWardenStatus('1');
                      $leave->setWardenAppDispp('1');
                      $leave->setLeaveStatus('1');
                      $leavemapper->save($leave);	
                      echo "1";
                  }else{
                    echo "proctor has not approved this particular leave form";
                    exit();
                  }
          }else{
              echo "throw an message exception saying its an invalid leave form";
              exit();
          }

      }
  }

    public function setUnApproveToLeaveForm(){

        $username = $_POST['username'];        
        $leavemapper = $this->getContainer()->get()->get('LeaveMapper');
        $leaveforms = $leavemapper->search("id = $username");
        
        foreach($leaveforms as $leave){
            if($leave->getWardenPermission() == 1 && ($leave->getProctorPermission() == 0 || $leave->getProctorPermission() == 1)){
                if($leave->getWardenStatus() == 0){
                    $leave->setWardenStatus('1');
                    $leave->setWardenAppDispp('1');
                    $leavemapper->save($leave);
                    echo "1";
                }
            }
        }
    }
     // accept the leave form
     public function setProctorApproveToLeaveForm(){

      $username = $_POST['regno'];
      $leavemapper = $this->getContainer()->get()->get('LeaveMapper');
      $leaveform = $leavemapper->search("id = '$username'");
      foreach($leaveform as $leave){
        if($leave->getProctorStatus() == 0 && $leave->getProctorPermission() == 1){
            $leave->setProctorStatus('1');
            $leave->setProctorAppDispp('1');
            $leavemapper->save($leave);
            echo "1";
         }else if($leave->getProctorStatus() == 1 && $leave->getProctorPermission() == 1){
                echo "1";
         }
        }
      }
     
    //decline the leave form  
     public function setProctorUnApproveToLeaveForm(){
      $username = $_POST['regno'];
      $leavemapper = $this->getContainer()->get()->get('LeaveMapper');

      $leaveform = $leavemapper->search("id = '$username'");

      foreach($leaveform as $leave){
          if( $leave->getProctorPermission() == 1 && $leave->getProctorStatus() == 0){
                $leave->setproctorStatus('1');
                $leave->setProctorAppDispp('0');
                $leavemapper->save($leave);
                echo "1";
        }else if($leave->getProctorPermission() == 1 && $leave->getProctorStatus() == 1){
            //$leave->setProctorStatus('0');
            //$leavemapper->save($leave);
            echo "1";
        }
      }
    }

}

