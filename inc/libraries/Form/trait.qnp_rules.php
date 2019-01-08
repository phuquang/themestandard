<?php
trait QNP_Rules
{
    /**
     * [required]
     * @param  [string] $str [description]
     * @return [true]      [is error]
     */
    private function _required($str)
    {
        if ( empty($str) ) {
            return true;
        }
        return false;
    }

    /**
     * [max]
     * @param  [string] $str [description]
     * @param  [integer] $max [description]
     * @return [true]      [is error]
     */
    private function _max($str,$max)
    {
        if ( mb_strlen($str) > $max ) {
            return true;
        }
        return false;
    }

    /**
     * [min]
     * @param  [string] $str [description]
     * @param  [integer] $min [description]
     * @return [true]      [is error]
     */
    private function _min($str,$min)
    {
        if ( mb_strlen($str) < $min ) {
            return true;
        }
        return false;
    }

    /**
     * [zipcode]
     * @param  [string] $str [description]
     * @return [true]          [is error]
     *         
     */
    private function _zipcode($str)
    {
        if ( !preg_match('/^(\d{3}[\s-]?\d{4})$/', $str) ) {
            return true;
        }
        return false;
    }

    /**
     * [hiragana]
     * @param  [string] $str [description]
     * @return [true]      [is error]
     */
    private function _hiragana($str)
    {
        if ( !preg_match('/([ぁ-ん゛ゝゞ]+)/', $str) ) {
            return true;
        }
        return false;
    }

    /**
     * [katakana]
     * @param  [string] $str [description]
     * @return [true]      [is error]
     */
    private function _katakana($str)
    {
        $pattern = "/^([゠ァアィイゥウェエォオカガキギクグケゲコゴサザシジスズセゼソゾタダチヂッツヅテデトドナニヌネノハバパヒビピフブプヘベペホボポマミムメモャヤュユョヨラリルレロヮワヰヱヲンヴヵヶヷヸヹヺ・ーヽヾヿ　]+)$/u";
        if ( !preg_match($pattern, $str) ) {
            return true;
        }
        return false;
    }

    /**
     * [email]
     * @param  [string] $str [description]
     * @return [true]      [is error]
     */
    private function _email($str)
    {
        if ( !filter_var($str, FILTER_VALIDATE_EMAIL) ) {
            return true;
        }
        return false;
    }

    /**
     * [phone]
     * @param  [string] $str [description]
     * @return [true]      [is error]
     */
    private function _phone($str)
    {
        if ( !preg_match('/^(\d|\+)(\d{2,4}[\s-]?\d{2,4}[\s-]?\d{2,4})$/', $str) ) {
            return true;
        }
        return false;
    }

    /**
     * [number]
     * @param  [number] $str [description]
     * @return [true]      [is error]
     */
    private function _number($str)
    {
        if ( preg_match('/\D/', $str) ) {
            return true;
        }
        return false;
    }

    private function _fullwidth($str)
    {
        if ( !preg_match('/^[^ -~｡-ﾟ\x00-\x1f\t]+$/u', $str) ) {
            return true;
        }
        return false;
    }

    private function _numfullwidth($str)
    {
        if ( preg_match('/０|１|２|３|４|５|６|７|８|９/', $str) ) {
            return true;
        }
        return false;
    }
}
