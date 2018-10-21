<?php

namespace LeaveFormManagement\Session;


interface SessionBagInterface extends \ArrayAccess ,\Iterator {

    public function add($key,$value);

    public function remove($key);

    public function get($key);
  
    public function clear();

    public function has($key);

}
