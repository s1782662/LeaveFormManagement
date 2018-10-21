<?php

namespace LeaveFormManagement\Controller;

use LeaveFormManagement\View\View;

use LeaveFormManagement\Controller\AbstractController;

class LoginController extends AbstractController{

    public function __construct(){
        parent::__construct();
     }

    public function Index(){

      $session = $this->getSession();
     
      
      $form = $this->getContainer()->get()->get('LoginForm')->init();

      //$form->fill($_POST);
      //
      $username = $session->get('login_u');

      $password = $session->get('login_p');
      if(empty($username) || empty($password)){
        echo "username and password  shouldn't be empty";
        exit();
      }

      $mapper = $this->getContainer()->get()->get('EntityMapper');

      $view = $this->getContainer()->get()->get('View');

      $table = $this->decideStrategyBehavior($username);

      $entity=$mapper->setTableForEntityMapper($table)->findById($username);
       
      if($entity != NULL){
  
        if($password == $entity->getPassword()){
                   
          $session->add('user', $entity);    

          if($table == "warden"){
              header("Location:unapprove.forms");
          }else if($table == "proctor"){
              header('Location:proctor.unforms');
          }else{
              header("Location:home");       
          } 
      }else{
              header("Location:lgerr");
      }
      }else{
              header("Location:lgerr");
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

         header("Location:lgerr");
      }
      return $table;
    }

    public function generateViewLoginError(){       
                 
      $view = $this->getContainer()->get()->get('View');

      $view->setTemplate('login_error')->render();
    }

    public function generateViewLogin(){
        $view = $this->getContainer()->get()->get('View');
        $view->setTemplate('login')->render();
    }


}


