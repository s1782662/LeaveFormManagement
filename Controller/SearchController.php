<?php

namespace LeaveFormManagement\Controller;

use LeaveFormManagement\Controller\AbstractController;

class SearchController extends AbstractController{

  public function search(){

    $session = $this->getSession();

    $form = $this->getContainer()->get()->get('SearchForm');

    $form->fill($_POST);
    
    $search = $form->getInput('regno')->getValue();

    $mapper = $this->getContainer()->get()->get('EntityMapper');

    $user = $mapper->findById($search);

    $session->add('results',$user);

  }

  public function generateStudentListForWarden(){
    
      $session = $this->getSession();

      $user = $session->get('user');

      $hostel = $this->getContainer()->get()->get('hostel');

      $users = $hostel->search('where wardenid ='+$user->wardenid);

      foreach($users as $user){
        echo $user->id;
      } 
  
  
  }

  
}
