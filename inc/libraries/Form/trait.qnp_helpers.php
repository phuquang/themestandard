<?php
namespace phuquang\Validation;

trait QNP_Helpers
{
    public static function eAgreement($name)
    {
        if ( self::issetPost($name) ) {
            echo 'checked="checked"';
        }
    }

    public static function eChecked($name, $value, $default = false)
    {
        $post = self::post($name);
        if ( $post == $value ) {
            echo 'checked="checked"';
        } elseif( $default ) {
            echo 'checked="checked"';
        }
    }

    public static function eSelected($name, $value, $default = false)
    {
        $post = self::post($name);
        if ( $post == $value ) {
            echo 'selected="selected"';
        } elseif ( $default ) {
            echo 'selected="selected"';
        }
    }

    public static function eCheckedbox($name, $value, $default = false)
    {
        $args = self::post($name);
        if ( is_array($args) && count($args) > 0 && in_array($value,$args) ) {
            echo 'checked="checked"';
        } elseif ( $default ) {
            echo 'checked="checked"';
        }
    }

    public static function eCheckedboxText($name, $value, $default = false)
    {
        $args = self::post($name);
        if ( is_array($args) && count($args) > 0 && in_array($value,$args) ) {
            echo '[●]';
        } elseif ( $default ) {
            echo '[　]';
        }
    }

    public static function eTextarea($name, $newline = false, $return = false)
    {
        if ( $post = self::post($name) ) {
            $post = $this::convertNewLine($post, $newline);

            if ( $return === true) {
                return $post;
            } else {
                echo $post;
            }
        }
    }

    // for ratio and select
    public static function args_msg($name, $args)
    {
        $post = self::post($name);
        if ( array_key_exists($post,$args) ) {
            return $args[$post];
        }
    }

    // for checkbox
    public static function args_checkbox($name, $val)
    {
        $args = self::post($name);
        if ( is_array($args) && count($args) > 0 && in_array($val,$args) ) {
            return $val;
        }
    }

    public static function hiddenInput($name)
    {
        echo "<input type='hidden' name='{$name}' value='".self::post($name)."'>";
    }

    public static function hiddenTextarea($name){
        echo "<textarea style='display:none' name='{$name}'>{self::post($name)}</textarea>";
    }
}
