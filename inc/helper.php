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
 *        [0]=> (object) { "slug"=>"yamanashi" }
 *        [1]=> (object) { "slug"=>"shizuoka" }
 *        [2]=> (object) { "slug"=>"aichi" }
 *      }
 * @result
 *     array(3) {
 *        [0]=> (object) { "slug"=>"aichi" }
 *        [1]=> (object) { "slug"=>"shizuoka" }
 *        [2]=> (object) { "slug"=>"yamanashi" }
 *      }
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

/**
 * the_build_url
 * @param  array   $args
 * @param  boolean $return
 * @return string
 */
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

/**
 * url
 * @param  boolean $return Echo or return
 * @return string url for home page
 */
if ( !function_exists('url') ) {
    function url( $return = false ) {
        if ( $return === true ) {
            return HOME_URL;
        } else {
            echo HOME_URL;
        }
    }
}

/**
 * getUrl
 * @return string url for home page
 */
if ( !function_exists('getUrl') ) {
    function getUrl() {
        return HOME_URL;
    }
}

/**
 * themeUrl
 * @param  boolean $return Echo or return
 * @return string url for theme
 */
if ( !function_exists('themeUrl') ) {
    function themeUrl( $return = false ) {
        if ( $return === true ) {
            return THEME_URL;
        } else {
            echo THEME_URL;
        }
    }
}

/**
 * getThemeUrl
 * @return string url for theme
 */
if ( !function_exists('getThemeUrl') ) {
    function getThemeUrl() {
        return THEME_URL;
    }
}

/**
 * assets
 * @param  boolean $return Echo or return
 * @return string url for assets folder
 */
if ( !function_exists('assets') ) {
    function assets( $return = false ) {
        if ( $return === true ) {
            return THEME_ASSETS;
        } else {
            echo THEME_ASSETS;
        }
    }
}

/**
 * getAssets
 * @return string url for assets folder
 */
if ( !function_exists('getAssets') ) {
    function getAssets() {
        return THEME_ASSETS;
    }
}

if ( !function_exists('get_bootstrap_paginate_links') ) {
    function get_bootstrap_paginate_links() {
        ob_start();
        ?>
        <nav class="pages clearfix">
            <?php
                global $wp_query;
                $current = max( 1, absint( get_query_var( 'paged' ) ) );
                $pagination = paginate_links( array(
                    'base' => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
                    'format' => '?paged=%#%',
                    'current' => $current,
                    'total' => $wp_query->max_num_pages,
                    'type' => 'array',
                    'prev_text' => '&laquo;',
                    'next_text' => '&raquo;',
                ) ); ?>
            <?php if ( ! empty( $pagination ) ) : ?>
                <ul class="pagination">
                    <?php foreach ( $pagination as $key => $page_link ) : ?>
                        <li class="page-item<?php if ( strpos( $page_link, 'current' ) !== false ) { echo ' active'; } ?>">
                            <?php echo str_replace( 'class="', 'class="page-link ', $page_link ) ?>
                        </li>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>
        </nav>
        <?php
        $links = ob_get_clean();
        return apply_filters( 'get_bootstrap_paginate_links', $links );
    }
}

if ( !function_exists('the_bootstrap_paginate_links') ) {
    function the_bootstrap_paginate_links() {
        echo get_bootstrap_paginate_links();
    }
}

/**
 * The function support for redirect
 *
 * @package WordPress
 * @subpackage Theme_Standard
 * @since 1.0
 * @version 1.0
 */

if ( !function_exists('cbaRedirectUrlTo404') ) {
    /**
     * cbaRedirectUrlTo404 redirect to not found page with condition
     * @return none
     */
    function cbaRedirectUrlTo404() {
        $gotonotfound = false;
        if ( !is_admin() ) {

            // if ($condition){
            //     $gotonotfound = true;
            // }

            if ( $gotonotfound === true ) {
                global $wp_query;
                $wp_query->set_404();
                status_header( 404 );
                nocache_headers();
            }
        }
    }
    add_action( 'wp', 'cbaRedirectUrlTo404' );
}

if ( !function_exists('cbaGoto404') ) {
    /**
     * cbaGoto404 redirect to not found page
     * @return none
     */
    function cbaGoto404() {
        global $wp_query;
        $wp_query->set_404();
        status_header( 404 );
        nocache_headers();
        get_template_part( 404 );
        exit;
    }
}
