<?php

namespace LeaveFormManagement\Form\Input;


class Form extends Fieldset
{

    public function fill(array $data)
    {
       parent::fill($data);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->inputs);
    }
}
