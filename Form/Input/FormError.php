<?php

namespace LeaveFormManagement\Form\Input;

use LeaveFormManagement\Model\AbstractEntity;

class FormError extends AbstractEntity{

    protected $allowedFields = array('error');

    protected $field = array();


    public function setError($error){
        $this->field['error'] = $error;
        return $this;
    }

    public function getError(){
        return $this->field['error'];
    }
    
}
