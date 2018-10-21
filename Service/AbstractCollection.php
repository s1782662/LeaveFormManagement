<?php


abstract class AbstractCollection implements Iterator,Countable,ArrayAccess{

  protected $_entities = array();
  protected $_entityclass;


  public function __construct(array $entities = array()){
    if(!empty($entities))
      $this->_entities = $entities;

    $this->rewind();
  }


  public function getEntities(){
    return $this->_entities;
  }


  public function clearEntities(){
    $this->_entities = array();
  }

  public function rewind(){
    reset($this->_entities);
  }

  public function current(){
    return current($this->_entities);
  }
  
  public function next(){
    next($this->_entities);
  }

  public function key(){
    return key($this->_entities);
  }

  public function count(){
    return count($this->_entities);
  }

  public function offestUnset($key){
    if()
  }

}







