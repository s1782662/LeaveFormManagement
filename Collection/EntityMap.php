<?php

namespace LeaveFormManagement\Collection;

use LeaveFormManagement\Model\EntityInterface;
use LeaveFormManagement\Collection\EntityMapCollection;
use LeaveFormManagement\Collection\EntityCollectionInterface;

class EntityMap implements EntityMapCollection{

  protected $map = [];

  public function add($key,EntityInterface $entity){
    if(isset($this->map[$key]))
      $this->replace($key,$entity);
    else
      $this->map[$key] = $entity;
  }

  public function addCollection($key,EntityCollectionInterface $collection){ 
    if(isset($this->map[$key]))
      $this->replaceCollection($key,$collection);
    else
      $this->map[$key] = $collection;

    return true;
  }

  public function replace($key,EntityInterface $entity){
    if(!isset($this->map[$key])){
      return false;
    }else{
      $this->map[$key] = $entity;
    }
  }

  public function replaceCollection($key,EntityCollectionInterface $collection){
    if(!isset($this->map[$key])){
      return false;
    }else{
      $this->map[$key] = $collection;
    }
    
  }
  public function get($key){
    if(isset($this->map[$key])){
      return $this->map[$key];
    }else{
      return false;
    }
  }
  public function getCollection($key){
    if(isset($this->map[$key])){
      return $this->map[$key];
    }else{
      return false;
    }
  }

  public function remove($key){
    if(isset($this->map[$key])){
      unset($this->map[$key]);
    }else{
      return false;
    }
  }

}
