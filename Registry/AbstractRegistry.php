<?php

namespace LeaveFormManagement\Registry;


abstract class AbstractRegistry
{
  protected static $instance = array();
  
  /*
   *Returns the instance of the class
   *
   *@param null returns $instance
   */

  public static function getInstance(){

    // Returns the class called function
    $class = get_called_class();

    if(!isset(self::$instance[$class])){
      self::$instance[$class] = new $class;
    }

    return self::$instance[$class];

   }

  /*
   *Constructor of the called class
   *
   * overridden by sub class
   */

  protected function __construct(){}

   /*
    *Preventing the clone instance of registry
    *
    *
    */
  protected function __clone(){}

    /*
     *sets the session key and value pair
     *
     *@param key and value 
     */
   abstract public function set($key,$value);
 
    /*
     *Gets the Session value by means of key 
     *
     *@param $key returns sessions value
     */
  abstract public function get($key);

    /*
     *Clears all sesssion
     *
     *
     */
  abstract public function clear();
}

