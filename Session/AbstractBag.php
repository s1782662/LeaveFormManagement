<?php

namespace LeaveFormManagement\Session;

use LeaveFormManagement\Session\SessionBagInterface;


abstract class AbstractBag implements SessionBagInterface{

  protected $bag;

  public function __construct(){
    $this->createbag();
  }

  public function offsetSet($key,$value){
    if(\is_null($key)){
      $this->bag[] = $value; 
    }else{
      $this->bag[$key] = $value;
    }
  }

  public function offsetGet($key){
    return isset($this->bag[$key])?$this->bag[$key] : null;
  }

  public function offsetUnset($key){
    unset($this->bag[$key]);
  }

  public function offsetExists($key){
    return isset($this->bag[$key]);
  }

  public function next(){
    \next($this->bag);
  }

  public function current(){
    \current($this->bag);
  }

  public function rewind(){
    \reset($this->bag);
  }

  public function key(){
    \key($this->bag);
  }

  public function valid(){
    return ($this->key() !== null);
  }

  public function add($key,$item){
    $this->offsetSet($key,$item);
  }

  public function remove($key){
    $this->offsetUnset($key);
  }

  public function get($key){
    $this->offsetGet($key);
  }

  public function clear(){
    $this->bag = array();
  }

  public function has($key){
    return $this->offsetGet($key);
  }

  protected abstract  function createbag();
}
