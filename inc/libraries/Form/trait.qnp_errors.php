<?php
namespace phuquang\Validation;

trait QNP_Errors
{
    /**
     * not errors
     * @return boolean
     */
    public function notErrors()
    {
        return count($this->errors) === 0;
    }

    /**
     * has errors
     * @return boolean
     */
    public function hasErrors()
    {
        return ! $this->notErrors();
    }

    /**
     * add error
     * @param string $name
     * @param string $method
     * @param string $message
     */
    public function addError($name, $method, $message)
    {
        if ( !isset($this->errors[$name]) || !is_array($this->errors[$name]) ) {
            $this->errors[$name] = array();
        }
        array_push($this->errors[$name], array($method => $message));
    }

    /**
     * print error
     * @param  string $name
     * @param  string $print
     * @return string
     */
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
