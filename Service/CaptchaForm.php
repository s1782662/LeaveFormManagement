<?php
namespace LeaveFormManagement\Service;

use LeaveFormManagement\Form\Input\Form;

class CaptchaForm extends Form{

  public function init(){

    $this->setField('captcha');

    $filter = $this->getFilter();

    $filter->setRule(
      'captcha',
      'Please enter the captcha value',
      function($value){
        return $value;
      }
    );

    return $this; 
  }

}

