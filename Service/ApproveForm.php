<?php

namespace LeaveFormManagement\Service;

use LeaveFormManagement\Form\Input\Form;

class ApproveForm extends Form {


  public function init(){

    $this->setField('regno');
    
        return $this;
  }
    
}
