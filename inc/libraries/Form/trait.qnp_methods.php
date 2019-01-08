<?php
trait QNP_Methods
{
    public static function methodIsPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    public static function methodIsGet()
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }

    public static function issetPost($name = '')
    {
        if ( array_key_exists($name, $_POST) ) {
            return true;
        }
        return false;
    }

    public static function post($name = '', $return = true, $filter = false)
    {
        $value = null;
        if ( array_key_exists($name, $_POST) && ! empty($_POST[$name]) ) {
            $value = $_POST[$name];
        }

        if ( $filter === true) {
            $value = $this::filter($value);
        }

        if ( $return === true) {
            return $value;
        } else {
            echo $value;
        }
    }
}