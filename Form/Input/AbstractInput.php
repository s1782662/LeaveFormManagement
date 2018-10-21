<?php

namespace LeaveFormManagement\Form\Input;


abstract class AbstractInput
{
   
    protected $name;
    
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    
    public function getFullName()
    {
        $name = $this->name;
        return $name;
    }
        
    public function read()
    {
        return $this;
    }
    
    
    public function get()
    {
        return $this;
    }
   
    abstract public function getValue();
}
