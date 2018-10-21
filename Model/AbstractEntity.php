<?php

namespace LeaveFormManagement\Model;

use LeaveFormManagement\Exception\EntityException;

abstract class AbstractEntity implements EntityInterface {

  protected $field = array();
  protected $allowedFields = array();

  public function __construct(array $data = array()){
     foreach($data as $name => $value)
       $this->$name = $value;
  }

  public function __set($name,$value){
    if(!in_array($name,$this->allowedFields))
      throw new EntityException('The field '.$name.' is not allowed for this entity' );
    $mutator = 'set'.ucfirst($name);
    if(method_exists($this,$mutator) && is_callable(array($this,$mutator)))
      $this->$mutator($value);
    else
      $this->field[$name] = $value;
  }


  public function __get($name){
    if(!in_array($name,$this->allowedFields)){
      throw new EntityException('The field '.$name.' is not allowed for this entity');
    }

    $accessor = 'get'.ucfirst($name);
    if(method_exists($this,$accessor) && is_callable(array($this,$accessor)))
      return $this->$accessor();
    if(isset($this->field[$name]))
      return $this->field[$name];
    else
      throw new EntityException('The field'.$name.'has not been set for this entity');
  }

  public function __isset($name){
    if(!in_array($name,$this->allowedFields))
      throw new EntityException('The field'.$name.'is not allowed for this entity');
    return isset($this->field[$name]);
  }

  public function __unset($name){
    if(!in_array($name,$this->allowedFields))
      throw new EntityException('The field'.$name.'is not allowed for this entity');

    if(isset($this->field[$name]))
      unset($this->field[$name]);
  }

  public function toArray(){
    return $this->field;
  }
}

