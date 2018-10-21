<?php

namespace LeaveFormManagement\Form\Input;

use Closure;


interface FilterInterface
{
   
    public function values(&$values);
    
   
    public function getMessages($field = null);
    
    
    public function addMessages($field, $messages);
}
