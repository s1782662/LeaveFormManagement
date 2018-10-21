<?php

namespace LeaveFormManagement\Registry;

class SessionRegistry extends AbstractRegistry
{

  protected function __construct(){
    session_start();
  }

  public function set($key,$value){
    if(!isset($_SESSION[$key]))
      $_SESSION[$key] = $value;

  }

  public function get($key){
    return isset($_SESSION[$key])?
      $_SESSION[$key]:NULL;

  }

  public function clear(){
    session_start();
    session_unset();
    session_destroy();
  }


}
