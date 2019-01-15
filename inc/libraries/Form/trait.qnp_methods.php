<?php
namespace phuquang\Validation;

trait QNP_Methods
{
    /**
     * Check method is post
     * @return boolean
     */
    public static function methodIsPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    /**
     * Check method is get
     * @return boolean
     */
    public static function methodIsGet()
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }

    /**
     * get value from post
     * @return string
     */
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

    /**
     * get value from get
     * @return string
     */
    public static function get($name = '', $return = true, $filter = false)
    {
        $value = null;
        if ( array_key_exists($name, $_GET) && ! empty($_GET[$name]) ) {
            $value = $_GET[$name];
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

    /**
     * Check name exist in post
     * @return boolean
     */
    public static function issetPost($name = '')
    {
        if ( array_key_exists($name, $_POST) ) {
            return true;
        }
        return false;
    }

    /**
     * Check name exist in get
     * @return boolean
     */
    public static function issetGet($name = '')
    {
        if ( array_key_exists($name, $_GET) ) {
            return true;
        }
        return false;
    }
}
