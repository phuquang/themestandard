<?php
namespace phuquang\Validation;

trait QNP_Errors
{
    public function notErrors()
    {
        return count($this->errors) === 0;
    }

    public function hasErrors()
    {
        return ! $this->notErrors();
    }

    public function addError($name, $method, $message)
    {
        if ( !isset($this->errors[$name]) || !is_array($this->errors[$name]) ) {
            $this->errors[$name] = array();
        }
        array_push($this->errors[$name], array($method => $message));
    }

    public function printError($name, $print = '')
    {
        if ( isset($this->errors[$name]) ) {
            $error = $this->errors[$name];
            if ( empty($print) ) {
                echo array_shift($error[0]);
            } else {
                echo $print;
            }
        }
    }
}