<?php
namespace LeaveFormManagement\Form\Input;

class Field extends AbstractInput
{
    protected $type;

    protected $attribs = [];

    protected $options = [];

    protected $value;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function fill($value)
    {
        $this->value = $value;
    }

    public function read()
    {
        return $this->value;
    }

    public function get()
    {
        $attribs = array_merge(
            [
                // force a particular order on some attributes
                'id'   => null,
                'type' => null,
                'name' => null,
            ],
            $this->attribs
        );

        return [
            'type'          => $this->type,
            'name'          => $this->getFullName(),
            'attribs'       => $attribs,
            'options'       => $this->options,
            'value'         => $this->value,
        ];
    }

    public function setAttribs(array $attribs)
    {
        $this->attribs = $attribs;
        return $this;
    }

    public function setOptions(array $options)
    {
        $this->options = $options;
        return $this;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }
}
