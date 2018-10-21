<?php 

namespace LeaveFormManagement\Controller;

use LeaveFormManagement\View\View;

class ProfileController extends AbstractController
{

    
 public function authorize(){
    
    $session = $this->getSession();

    if(!$session->isauthorize('user')){
        
        $err = $this->getFormError();
        
        $err->setError('Session Expired');
        
        $view = $this->getContainer()->get()->get('View');

        $view->setTemplate('login_error')->setFields($err->toArray())->render();
        
        exit();
    }
    
 }

    
 public function profile() {
    
    $this->authorize();

    $session = $this->getSession();

    $user = $session->get('user');  

    if(preg_match('/^[0-9]{2}[A-Za-z]{3}[0-9]{4}$/',$user->id)){

        $view = $this->getContainer()->get()->get('View');

        $view->setTemplate('studentprofile')->setFields($user->toArray())->render();
    }else{
        echo "not an unauthorized user";
    }
  }    

 public function warden() {
    
    $this->authorize(); 

    $session = $this->getSession();
   
    $user = $session->get('user');  

    if(preg_match('/^w[0-9]{5}$/',$user->id)){
    
        $view = $this->getContainer()->get()->get('View');

        $view->setTemplate('wardenprofile')->setFields($user->toArray())->render();
    
     }else{
        echo "not an authorized user";
     }   

  }
  
  public function proctor() {
    
    $this->authorize();  
  
    $session = $this->getSession();
   
    $user = $session->get('user');  

    if(preg_match('/^[0-9]{5}$/',$user->id)){

        $view = $this->getContainer()->get()->get('View');

        $view->setTemplate('proctorprofile')->setFields($user->toArray())->render();       
    }else{
        echo "Not an authorized user";
    }   

  }

  public function wardenProfile(){
  
    $session = $this->getSession();
  
    $user = $session->get('user');

    if(preg_match('/^[0-9]{2}[A-Za-z]{3}[0-9]{4}$/',$user->id)){

        if($session->offsetExists('{$user->getId()."warden"}')){
        
            $entity =  $session->get('{$user->getId()."warden"}');
    
        }else{
      
           $entity = $this->getContainer()->get()->get('HostelMapper')->findById($user->getId());
        
           $entity = $this->getContainer()->get()->get('EntityMapper')->setTableForEntityMapper('warden')->findById($entity->getWardenid());
    
           $session->add('{$entity->getId()."warden"}',$entity);
   
        }
 
        $view = $this->getContainer()->get()->get('View');

        $view->setTemplate('warden')->setFields($entity->toArray())->render();
    
    }else{
        echo "Not an authorizeduser";
     } 
   }


  public function proctorProfile(){

    $session = $this->getSession();
    $user = $session->get('user');
    
    if(preg_match('/^[0-9]{2}[A-Za-z]{3}[0-9]{4}$/',$user->id)){

        if($session->offsetExists('{$user->getId()."proctor"}')){
          $entity =  $session->get('{$user->getId()."proctor"}');
        }else{
          $entity = $this->getContainer()->get()->get('HostelMapper')->findById($user->getId());
          $entity = $this->getContainer()->get()->get('EntityMapper')->setTableForEntityMapper('proctor')->findById($entity->getProctorid());
          $session->add('{$user->getI()."proctor"}',$entity);
        }
      $view = $this->getContainer()->get()->get('View');
      $view->setTemplate('proctor')->setFields($entity->toArray())->render();
      }else{
        echo "not an authorized user";
      }
    }

  public function leaveFormViewProfile(){

    $session = $this->getSession();

    $this->authorize();

    $view = $this->getContainer()->get()->get('View');

    $view->setTemplate('leave_form')->render();
     
  }

  public function profilePasswordUpdate(){

    $session = $this->getSession();

    $user = $session->get('user');

    $form =  $this->getContainer()->get()->get('profileform');

    $form->init()
         ->fill($_POST);

    $password = $form->getInput('password')->getValue();


    $entitymapper = $this->getContainer()->get()->get('EntityMapper');
  
    $table = $this->decideStrategyBehavior($user->id);	
  
    $entity = $entitymapper->setTableForEntityMapper($table)->findById($user->id);

    if($password == $entity->getPassword()){

      $new_password = $form->getInput('newpassword')->getValue();

      $confirm_password = $form->getInput('confirmpassword')->getValue();

      if($new_password == $confirm_password){

        $entity->setPassword($new_password);

        if($entitymapper->setTableForEntityMapper($table)->save($entity) == 1){
          echo "Password Updated";
        }

        header('Location:../LeaveFormManagement/'.$table	);
      }else{
        echo "Sorry Both New Password and Old Password are not matching";
      }
    }else{
      echo "Sorry Your Current Password is wrong";
    }

  }
  
   public function decideStrategyBehavior($username){

      $table = '';

      if(preg_match('/^[0-9]{2}[A-Za-z]{3}[0-9]{4}$/',$username)){

        $table = "student";

      }else if(preg_match('/^[0-9]{5}$/',$username)){

        $table = "proctor";

      }elseif(preg_match('/^w[0-9]{5}$/',$username)){

        $table = "warden";
     

      }else{

        return 0;
      }
      return $table;
    }

  public function getStatusView(){
    $session = $this->getSession();

    $view = $this->getContainer()->get()->get('View');
    
    $results = $session->get('results');

    if($results == NULL){
      $view->setTemplate('leave_status_no')->render();  
    }
    $view->setTemplate('leave_form_status')->setFields($results->toArray())->render();

  }


  public function getRespectiveProctorStudent(){

      $session = $this->getSession();

      $user = $session->get('user');

      $entity = $this->getContainer()->get()->get('eventMapper');
      
      $hostel = $this->getContainer()->get()->get('hostel');

      $students = $hostel->search(" proctorid = '$user->id'");

      $composite = $this->getContainer()->get()->get('composite');

      $header = new View('insert student list header template');

      $composite->attachView($header);

      foreach($students as $student){
          $body = new view('insert student list body template ');
          $body->setFields($student->toArray());
          $composite->attachView($body);      
      }
        
      $footer = new View('insert student list footer template');
      $composite->attachView($footer);

           

 
  }


}



