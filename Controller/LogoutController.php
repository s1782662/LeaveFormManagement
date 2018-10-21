<?php

namespace LeaveFormManagement\Controller;

use LeaveFormManagement\Controller\AbstractController;

class LogoutController extends AbstractController{
		
		public function __construct(){
 	       parent::__construct();
     }

    public function Index(){

      $session = $this->getSession();
      
      $view = $this->getContainer()->get()->get('View');
      
      $session->destroy();
      
      header('Location:../LeaveFormManagement/login');
      
     }
     
   }  
