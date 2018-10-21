<?php

namespace LeaveFormManagement\Controller;

use LeaveFormManagement\Service\Container;

class AbstractController{

  protected $container;

  public function __construct(){
    $this->container = new Container();
  }

  public function getContainer(){
    return $this->container;
  }

  public function getDatabase(){
    return $this->container->get()->get('database');
  }

  public function getSession(){
   return $this->container->get()->get('Session');
  }

  public function getForm(){
    return $this->container->get()->get('Form');
  }

  public function getView(){
    return $this->getContainer->get()->get('View');
  }

  public function getLogger(){
    
  }

  public function getFormError(){
    return $this->container->get()->get('err');
  }

  public function renderView(){
    return $this->render();
  }
}
