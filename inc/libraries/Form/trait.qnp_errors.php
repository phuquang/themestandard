<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
    die();
}

trait QNP_Errors
{
    public function notErrors()
    {
        return count($this->errors) === 0;
    }

    public function addError($name, $method, $message)
    {
        if ( !isset($this->errors[$name]) || !is_array($this->errors[$name]) ) {
            $this->errors[$name] = array();
        }
        array_push($this->errors[$name], array($method => $message));
    }
}