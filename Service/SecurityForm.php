<?php

namespace LeaveFormManagement\Service;

use LeaveFormManagement\Form\Input\Form;

class SecurityForm extends Form{

    public function init(){
        $this->setField('username')->setAttribs([
            'size'=>9,
            'maxlength'=>9,
        ]);

        $filter = $this->getFilter();

        $filter->setRule(
            'username',
            'Reg No shouldn\'t be Empty',
            function($value){
                return $value;
            }
        );


       return $this; 
    }

}
