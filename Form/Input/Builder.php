<?php

namespace LeaveFormManagement\Form\Input;


class Builder implements BuilderInterface
{
    protected $field_class = 'LeaveFormManagement\Form\Input\Field';
         
    public function newField($name, $type = null)
    {
        if (! $type) {
            $type = 'text';
        }
        $class = $this->field_class;
        $field = new $class($type);
        $field->setName($name);
        return $field;
    }
      
  
}
