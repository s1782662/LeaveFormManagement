<?php

namespace LeaveFormManagement\Session;

use LeaveFormManagement\Session\SessionInterface;
use LeaveFormManagement\Session\ObjectBag;
use \SessionHandlerInterface;

class Session implements SessionInterface {
  
  protected $bag;

  public function __construct(SessionHandlerInterface $handler,$mode = 'files') {
      
    \ini_set('session.save_handler',$mode);
    \session_set_save_handler($handler,true);
    
    $this->start();
    
    $this->bag = new ObjectBag();
  }
  
  public function start() {
  
    if(\session_status() == PHP_SESSION_NONE){
       \session_start();
    }
  }

  public function destroy() {
    
    if(\session_status() == PHP_SESSION_ACTIVE){
       \session_destroy();
     }
  }

  public function add($key,$value){
  
      $this->offsetSet($key,$value);
  }

  public function remove($key){
      
    $this->offsetUnset($key);
  }

  public function get($key){
  
    return $this->offsetGet($key);
  }

  public function reset(){
  
    $this->clear();
    \session_regenerate_id();
  }

  public function isLoggedIn(){

    return \in_array("user", $_SESSION);
  }

  public function offsetSet($offset,$value){
    
    if(\is_null($offset)){
        $_SESSION[] = $value;
     
    }else{
        $_SESSION[$offset] = $value;
    }
  }

  public function offsetGet($offset){
   
    return isset($_SESSION[$offset]) ? $_SESSION[$offset] : NULL;
  }

  public function offsetUnset($offset){
  
    if(isset($_SESSION[$offset])){
      
        unset($_SESSION[$offset]);
      }
  }

  public function offsetExists($offset){
  
    return isset($_SESSION[$offset]);
  }

  public function rewind(){
  
    \reset($_SESSION);
  }

  public function current(){
  
    \current($_SESSION);
  }

  public function clear(){
 
    \session_unset();
  }

  public function next(){

    \next($_SESSION);
  }

  public function key(){
    
    $this->valid();
  }

  public function valid(){

    return \key($_SESSION) !== null;
  }

  public function getId(){

    return \session_id();
  }

  public function &getObjectBag(){
  
    return $this->bag;
  }

 public function isauthorize($user){
    return isset($_SESSION[$user])? true : false;
 }

}
