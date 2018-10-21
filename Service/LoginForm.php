<?php

namespace LeaveFormManagement\Service;

use LeaveFormManagement\Form\Input\Form;

class LoginForm extends Form{


  public function init(){
    $this->setField('username')->setAttribs([
      'size' => 9,
      'maxlength'=>9,
    ]);

    $this->setField('password')->setAttribs([
      'size'=>20,
      'maxlength'=>20,
    ]);

    $filter =  $this->getFilter();

    $filter->setRule(
      'username',
      'UserName should be Your Reg No',
      function($value){
          return $value;
        }
      
    );

    $filter->setRule(
      'password',
      'Password should be greater Length',
      function($value){
          return $value;
      }
    );

    return $this;
  }


}
