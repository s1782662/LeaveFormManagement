<?php

namespace LeaveFormManagement\View;

class View implements ViewInterface,TemplateInterface,ContainerInterface{

  const DEFAULT_TEMPLATE = "default.php";
	
  protected $template = self::DEFAULT_TEMPLATE;
  protected $fields = array();
  

  public function __construct($template = null){
    if($template != null){
      $this->setTemplate($template);
    }

  }

  public function setTemplate($template){
    $template = __DIR__.'/'.$template.".php";
    if(!is_file($template) || !is_readable($template)) 
      throw new \InvalidArgumentException('Check the file permissions or the file may not present');

    $this->template = $template;
    return $this;
  }

  public function getTemplate(){
    return $this->template;
  }

	
  public function setFields($fields){
   if(!empty($fields)){
      foreach($fields as $name => $value){
        $this->$name = $value;
      }
    }
    return $this;
  }
  public function __set($name,$value){
    $this->fields[$name] = $value;
    return $this;
  }

  public function __get($name){
    if(!isset($this->fields[$name]))
      throw new \InvalidArgumentException('The Field is not set');
    return $this->fields[$name];
  }

  public function __isset($name){
    return isset($this->fields[$name]);
  }

  public function __unset($name){
    if(!isset($this->fields[$name]))
        throw new \InvalidArgumentException('The field is not filled to delete');
    unset($this->fields[$name]);
    return $this;
  }
		
    //extract($this->fields);
  public function render(){
     extract($this->fields);
   	 \ob_start();
     include($this->template);
		 return \ob_end_flush(); 	   
  }
  
  
 
  
}
 
