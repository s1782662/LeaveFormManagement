<?php

namespace LeaveFormManagement\Service;

use LeaveFormManagement\Form\Input\Form;

class ProfileForm extends Form {


  public function init(){

    $this->setField('name');
    
    $this->setField('password');
    $this->setField('newpassword');
    
    $this->setField('confirmpassword');

    $this->setField('id'); 
    $this->setField('mobile');

    $this->setField('email');
    $this->setField('birthday');

    $this->setField('address');
    $this->setField('area');

		$this->setField('city');
    $this->setField('pincode');

    $this->setField('state');
    $this->setField('gender');

    $this->setField('country');
      
        return $this;
  }
    
}
