<?php
/**
 * The function support for member
 *
 * @package WordPress
 * @subpackage Theme_Standard
 * @since 1.0
 * @version 1.0
 */

if ( !function_exists('mb_limit_text') ) {
    function mb_limit_text($str = '', $byte = 64, $more = '…') {
        $str = mb_substr( $str,0,$byte);
        if ( mb_strlen($str) >= $byte ) {
            $str .= $more;
        }
        return $str;
    }
}

/**
 * cbaOrderByArray
 * @param  [array] $obj_args   
 * @param  [array] $order_args 
 * @return [array]             
 * @example
 * $order_args = array('aichi','shizuoka','yamanashi')
 * $obj_args = array(3) {
          [0]=> (object) { "slug"=>"yamanashi" }
          [1]=> (object) { "slug"=>"shizuoka" }
          [2]=> (object) { "slug"=>"aichi" }
        }
 * @result
 *     array(3) {
          [0]=> (object) { "slug"=>"aichi" }
          [1]=> (object) { "slug"=>"shizuoka" }
          [2]=> (object) { "slug"=>"yamanashi" }
        }
 */
function cbaOrderByArray($obj_args, $order_args) {
    $tmp_args = array();
    foreach ( $order_args as $k1 => $order ) {
        foreach ( $obj_args as $k2 => $obj ) {
            if ( $obj->slug == $order ) {
                $tmp_args[] = $obj;
                unset($obj_args[$k2]);
            }
        }
    }
    if ( count($tmp_args) > 0 && count($obj_args) ) {
        return array_merge($tmp_args,$obj_args);
    }
    return $tmp_args;
}

if ( !function_exists('the_build_url') ) {
    function the_build_url($args = array(), $return = false) {
        if ( !count($args) ) {
            $args = $_GET;
        }
        if ( count($args) ) {
            $query = http_build_query($args);
            $query = preg_replace('/%5B[0-9]+%5D/simU', '%5B%5D', $query);
            if ($return) {
                return '?'.$query;
            } else {
                echo '?'.$query;
            }
        }
    }
}

if ( !function_exists('the_pagination') ) {
    function the_pagination($config) {
        $pagination = new QNP_Pagination($config);

        // Default config
        // $pagination->paged_name     = 'pageded';
        // $pagination->label_first    = '最初へ';
        // $pagination->label_last     = '最後へ';
        // $pagination->label_previous = '前へ';
        // $pagination->label_next     = '次へ';
        // $pagination->class_li       = 'page-item';
        // $pagination->class_a        = 'page-link';
        // $pagination->range          = 2;
        // $pagination->hide_dot       = false;
        // $pagination->hide_first     = false;
        // $pagination->hide_last      = false;
        // $pagination->hide_previous  = false;
        // $pagination->hide_next      = false;

        ?>
        <nav>
            <ul class="pagination">
                <?php $pagination->pagination(); ?>
            </ul>
            <?php $pagination->pagerText('<span>', '</span>'); ?>
            <?php $pagination->gotoPager(); ?>
        </nav>
        <?php
    }
}

if ( !function_exists('url') ) {
    function url() {
        echo HOME_URL;
    }
}

if ( !function_exists('getUrl') ) {
    function getUrl() {
        return HOME_URL;
    }
}

if ( !function_exists('themeUrl') ) {
    function themeUrl() {
        echo THEME_URL;
    }
}

if ( !function_exists('getThemeUrl') ) {
    function getThemeUrl() {
        return THEME_URL;
    }
}

if ( !function_exists('assets') ) {
    function assets() {
        echo THEME_ASSETS;
    }
}

if ( !function_exists('getAssets') ) {
    function getAssets() {
        return THEME_ASSETS;
    }
}
