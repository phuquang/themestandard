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
    public static function post($name = '', $return = true, $filter = false, $filter_list = array())
    {
        $value = null;
        if ( array_key_exists($name, $_POST) && ! empty($_POST[$name]) ) {
            $value = $_POST[$name];
        }

        if ( ! empty($value) && $filter === true) {
            $value = self::filter($value, $filter_list);
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
    public static function get($name = '', $return = true, $filter = false, $filter_list = array())
    {
        $value = null;
        if ( array_key_exists($name, $_GET) && ! empty($_GET[$name]) ) {
            $value = $_GET[$name];
        }

        if ( $filter === true) {
            $value = self::filter($value, $filter_list);
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

    public static function filter($value, $filter_list = array())
    {
        foreach ($filter_list as $method_name) {
            if ($method_name === 'trim') {
                $value = trim($value);
            }

            if ($method_name === 'mb_trim') {
                $value = mb_trim($value);
            }

            if ($method_name === 'stripslashes') {
                $value = stripslashes($value);
            }

            if ($method_name === 'htmlentities') {
                $value = htmlentities($value);
            }

            if ($method_name === 'htmlspecialchars') {
                $value = htmlspecialchars($value);
            }

            if ($method_name === 'sql_escape') {
                $value = sql_escape($value);
            }

            if ($method_name === 'addslashes') {
                $value = addslashes($value);
            }
        }
        return $value;
    }
}
