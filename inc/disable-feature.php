<?php
/**
 * The function for disable default feature of wordpress
 *
 * @package WordPress
 * @subpackage Theme_Standard
 * @since 1.0
 * @version 1.0
 */

$disable_crop_image   = false;
$disable_wp_generator = false;
$disable_emoji        = false;
$disable_json_api     = false;
$disable_wlwmanifest  = false;
$disable_rsd          = false;
$disable_shortlink    = false;
$disable_embed_script = false;
$disable_svg_icons    = false;

// disable crop image feature
if ($disable_crop_image === true){
    function disable_crop( $enable, $orig_w, $orig_h, $dest_w, $dest_h, $crop )
    {
        // Instantly disable this filter after the first run
        // remove_filter( current_filter(), __FUNCTION__ );
        // return image_resize_dimensions( $orig_w, $orig_h, $dest_w, $dest_h, false );
        return false;
    }
    add_filter( 'image_resize_dimensions', 'disable_crop', 10, 6 );

    function disable_extra_image_sizes() {
        foreach ( get_intermediate_image_sizes() as $size ) {
            remove_image_size( $size );
        }
    }
    add_action( 'init', 'disable_extra_image_sizes' );
}

// remove WordPress Generator (with version information)
if ($disable_wp_generator === true){
    remove_action('wp_head', 'wp_generator');
}

// remove wp emoji
if ($disable_emoji === true){
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
}

// remove the WordPress JSON API link
if ($disable_json_api === true){
    remove_action( 'wp_head','rest_output_link_wp_head');
    remove_action( 'wp_head','wp_oembed_add_discovery_links');
    remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
}

// remove Windows Live Writer Manifest Link
if ($disable_wlwmanifest === true){
    remove_action( 'wp_head', 'wlwmanifest_link');
}

// remove Weblog Client Link
if ($disable_rsd === true){
    remove_action ('wp_head', 'rsd_link');
}

// remove WordPress Page/Post Shortlinks
if ($disable_shortlink === true){
    remove_action( 'wp_head', 'wp_shortlink_wp_head');
}

// remove wp-embed.min.js
if ($disable_embed_script === true){
    function remove_deregister_scripts(){
      wp_deregister_script( 'wp-embed' );
    }
    add_action( 'wp_footer', 'remove_deregister_scripts' );
}

// remove include svg icons
if ($disable_svg_icons === true){
    remove_action( 'wp_footer', 'twentyseventeen_include_svg_icons', 9999 );
}
