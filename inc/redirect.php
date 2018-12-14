<?php
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
