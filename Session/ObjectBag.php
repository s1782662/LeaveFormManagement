<?php

namespace LeaveFormManagement\Session;

use LeaveFormManagement\Session\AbstractBag;

class ObjectBag extends AbstractBag{

 protected function createbag(){
    if(!isset($_SESSION['OBJECT'])){
        $_SESSION['OBJECT'] = [];
      $this->bag = &$_SESSION['OBJECT'];
    }
 }
}
