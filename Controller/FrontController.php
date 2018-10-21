<?php

namespace LeaveFormManagement\Controller;

use LeaveFormManagement\Controller\LoginController;
use \Reflectionclass;


class FrontController implements FrontControllerInterface{

  const DEFAULT_CONTROLLER = "indexController";
  const DEFAULT_ACTION = "index";

  protected $controller = self::DEFAULT_CONTROLLER;
  protected $action = self::DEFAULT_ACTION;
  protected $params = array();
 
  public function __construct(array $options = array()){
  
    if(isset($options['controller'])){
      $this->setController($options['controller']);
    }
    if(isset($options['action'])){
      $this->setAction($options['action']);
    }
    if(isset($options['params'])){
      $this->setParams($options['params']);
    }
  }

  public function setController($controller){
    $controller = "LeaveFormManagement\\Controller\\".ucfirst($controller);
    if(!class_exists($controller)){
      throw new \InvalidArgumentException("The action controller has not beedn defined");
    }
    $this->controller = $controller;
    return $this;
  }

  public function setAction($action){
    $reflector = new \Reflectionclass($this->controller);

    if(!$reflector->hasMethod($action)){
      throw new \InvalidArgumentException("The method has not been defined for particular controller");
    }

    $this->action = $action;
    return $this;
  }

  public function setParams(array $params = array()){
    if(!empty($params)){
      $this->params = $params;
    }
    return $this;
  }

  public function run(){
    call_user_func_array(array(new $this->controller,$this->action),$this->params);
  }

}
