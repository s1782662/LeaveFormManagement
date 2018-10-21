<?php

namespace LeaveFormManagement\Form\Input;

use LeaveFormManagement\Form\Input\BuilderInterface;
use LeaveFormManagement\Form\Input\FilterInterface;
use LeaveFormManagement\Form\Input\Filter;

class Fieldset extends AbstractInput
{

    protected $builder;

    protected $filter;

    protected $inputs = [];

    protected $options;

   public function __construct(BuilderInterface $builder,FilterInterface  $filter,$options = null) {
        $this->builder  = $builder;
        $this->filter   = $filter;
        $this->options  = $options;

    }

    public function __get($name)
    {
        return $this->getInput($name)->read();
    }

    public function __set($name, $value)
    {
        $this->getInput($name)->fill($value);
    }

    public function __isset($name)
    {
        if (! isset($this->inputs[$name])) {
            return false;
        }

        return $this->getInput($name)->read() !== null;
    }

    public function __unset($name)
    {
        if (isset($this->inputs[$name])) {
            $this->getInput($name)->fill(null);
        }
    }
    public function getFilter()
    {
        return $this->filter;
    }

    public function getInput($name)
    {
        if (! isset($this->inputs[$name])) {
            throw new Exception\NoSuchInput($name);
        }

        $input = $this->inputs[$name];
        return $input;
    }

    public function getInputNames()
    {
        return array_keys($this->inputs);
    }

    public function getBuilder()
    {
        return $this->builder;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function fill(array $data)
    {
        foreach ($this->inputs as $key => $input) {
            if (array_key_exists($key, $data)) {
                $input->fill($data[$key]);
            }
        }

    }

    public function setField($name, $type = null)
    {
        $this->inputs[$name] = $this->builder->newField($name, $type);
        return $this->inputs[$name];
    }

    public function get($name = null)
    {
        if (! $name) {
            return $this;
        }

        if (! isset($this->inputs[$name])) {
            throw new Exception\NoSuchInput($name);
        }

        $input = $this->inputs[$name];
        return $input->get();
    }

    public function filter()
    {
        return $this->filter->values($this);
    }

    public function getMessages($name = null)
    {
        return $this->filter->getMessages($name);
    }

    public function getValue()
    {
        $data = [];
        foreach ($this->inputs as $name => $input) {
            $data[$name] = $input->getValue();
        }
        return $data;
    }
}
