<?php

namespace LeaveFormManagement\Collection;

use LeaveFormManagement\Model\EntityInterface;
use LeaveFormManagement\Collection\EntityCollectionInterface;

class EntityCollection implements EntityCollectionInterface{

  protected $entity = array();

  public function __construct(array $entity = array()){
    if(!empty($entity))
      $this->entity = $entity;
    $this->rewind();
  }

  public function toArray(){
    return $this->entity;
  }

  public function clear(){
    $this->entity = array();
  }

  public function rewind(){
    reset($this->entity);
  }

  public function current(){
    return current($this->entity);
  }

  public function next(){
    next($this->entity);
  }

  public function key(){
    return key($this->entity);
  }

  public function valid(){
    return $this->offsetExists();
  }

  public function count(){
    return count($this->entity);
  }

  public function offsetSet($key,$entity){
    $class = new \ReflectionClass($entity);
    if(!$class->implementsInterface('LeaveFormManagement\Model\EntityInterface'))
      throw new \InvalidArgumentException("cannot add user");

    if(!isset($key)){
      $this->entity[] = $entity;
    }else{
      $this->entity[$key] = $entity;
    }
   }

  public function offsetUnset($key){
    if($key instanceof EntityInterface){
      $this->entity = array_filter($this->entity,function ($value) use ($key){
        return $value !== $key;
      }
    );
    }else if(isset($this->entity[$key])){
      unset($this->entity[$key]);
    }
  }

    public function offsetGet($key){
    if(isset($this->entity[$key])){
      return isset($this->entity[$key])?$this->entity[$key]:null;
     }
    }

    public function offsetExists($key){
      return isset($this->entity[$key]);
    }

    public function get($key){
      $this->offsetGet($key);
    }


    public function Exists($key){
      $this->offsetExists($key);
    }

    public function add($key,EntityInterface $user){
      $this->offsetSet($key,$user);
    }

    public function remove(EntityInterface $user){
      $this->offsetUnset($user);
    }

    public function getIterator(){
      return new \ArrayIterator($this->entity);
    }
}
