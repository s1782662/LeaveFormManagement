<?php

namespace LeaveFormManagement\Controller;

use LeaveFormManagement\Controller\AbstractController;

class SecurityController extends AbstractController{

    public function __construct(){
        parent::__construct();
    }
 
    public function search(){
        
        $form = $this->getContainer()->get()->get('securityForm');

        $leaveform = $this->getContainer()->get()->get('LeaveMapper');
        
        $form->init()->fill($_POST);

        $username = $form->getInput('username')->getValue();

        if($username == NULL){
            header('Location:securityview');
        }

        $leave  = $leaveform->findById($username);

        $view = $this->getContainer()->get()->get('View');

        $view->setTemplate('securityResult')->setFields($leave->toArray())->render();
                
    }

    public function searchView(){
        
        $view = $this->getContainer()->get()->get('View');

        $view->setTemplate('security')->render();
    
    }
    

}


