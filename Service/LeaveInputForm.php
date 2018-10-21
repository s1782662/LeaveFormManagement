<?php

namespace LeaveFormManagement\Service;

use LeaveFormManagement\Form\Input\Form;

class LeaveInputForm extends Form {

  public function init(){
    $this->setField('startdate');

    $this->setField('starttime');

    $this->setField('enddate');

    $this->setField('endtime');

   $this->setField('purpose');

    $this->setField('visiting');

    $filter = $this->getFilter();

    $filter->setRule(
      'startdate',
      'date is not in correct form',
      function ($value){
        return $value;
      }
    );

    $filter->setRule(
      'enddate',
      'date to is not in correct format',
      function ($value){
        return $value;
      }
    );

    $filter->setRule(
      'starttime',
      'from time is not set correctly',
      function ($value){
        return $value;
      }
    );

    $filter->setRule(
      'endtime',
      'to time is not set correctly',
      function ($value){
        return $value;
      }
    );
  
    $filter->setRule(
      'visiting',
      'Place should\'t be left unfilled',
      function ($value){
        return $value;
      }
  );

    $filter->setRule(
      'purpose',
      'Purpose shouldn\'t be unleft',
      function ($value){
        return $value;
      }
    );

    


    return $this;
  }
}
