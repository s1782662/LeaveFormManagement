<?php

namespace LeaveFormManagement\Service;

use LeaveFormManagement\Form\Input\Form;

class MessageForm extends Form{


    public function init(){
        
        $this->setField('from')->setAttribs([
            'size'=>9,
            'maxlength'=>9,
        ]);

        $this->setField('to')->setAttribs([
            'size'=>9,
            'maxlength'=>9,
        ]);

        $this->setField('content')->setAttribs([
            'size'=>100,
            'maxlength'=>100,
        ]);

        $this->setField('status');

        $filter = $this->getFilter();

        $filter->setRule(
            'from',
            'from id should\'nt be empty',
            function($value){
                return $value;
            }
        );

        $filter->setRule(
            'to',
            'to id should\'nt be empty',
            function($value){
                return $value;
            }
        );

        $filter->setRule(
            'content',
            'Content should\'nt be empty',
            function($value){
                return $value;
            }
        );

        $filter->setRule(
            'status',
            'It shouldn\'t be empty',
            function($value){
                return $value;
            }
        );
        return $this;
    }
    
}
