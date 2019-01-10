<?php
namespace phuquang\Validation;

class QNP_Field
{
    use QNP_Methods;
    public $name;
    public $label;
    public $value;

    public function __construct($name, $label)
    {
        $this->name = $name;
        $this->label = $label;
        if ( $this->methodIsPost() && $this->issetPost($this->name) ) {
            $this->value = $this->post($this->name);
        }
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setLabel($label)
    {
        $this->label = $label;
    }
}