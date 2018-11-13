<?php
/**
 * The function for disable default feature of wordpress
 *
 * @package WordPress
 * @subpackage Theme_Standard
 * @since 1.0
 * @version 1.0
 */

$disable_crop_image                    = false;
$disable_wp_generator                  = false;
$disable_emoji                         = false;
$disable_json_api                      = false;
$disable_wlwmanifest                   = false;
$disable_rsd                           = false;
$disable_shortlink                     = false;
$disable_embed_script                  = false;
$disable_svg_icons                     = false;
$disable_update_core                   = false;
$disable_update_plugins                = false;
$disable_update_themes                 = false;
$disable_check_version_core            = false;
$remove_menu_page_dashboard            = false;
$remove_menu_page_jetpack              = false;
$remove_menu_page_posts                = false;
$remove_menu_page_media                = false;
$remove_menu_page_pages                = false;
$remove_menu_page_comments             = false;
$remove_menu_page_appearance           = false;
$remove_menu_page_appearance_customize = false;
$remove_menu_page_appearance_widgets   = false;
$remove_menu_page_appearance_menu      = false;
$remove_menu_page_plugins              = false;
$remove_menu_page_users                = false;
$remove_menu_page_tools                = false;
$remove_menu_page_settings             = false;
$remove_menu_page_settings_writing     = false;
$remove_menu_page_settings_reading     = false;
$remove_menu_page_settings_discussion  = false;
$remove_menu_page_settings_media       = false;
$remove_menu_page_settings_permalink   = false;
$remove_menu_page_settings_privacy     = false;
$disable_editor_by_post                = false;
$disable_editor_by_page                = false;
$disable_editor_by_template_args       = array();

// disable crop image feature
if ($disable_crop_image === true){
    function cba_disable_crop( $enable, $orig_w, $orig_h, $dest_w, $dest_h, $crop )
    {
        // Instantly disable this filter after the first run
        // remove_filter( current_filter(), __FUNCTION__ );
        // return image_resize_dimensions( $orig_w, $orig_h, $dest_w, $dest_h, false );
        return false;
    }
    add_filter( 'image_resize_dimensions', 'cba_disable_crop', 10, 6 );

    function cba_disable_extra_image_sizes() {
        foreach ( get_intermediate_image_sizes() as $size ) {
            remove_image_size( $size );
        }
    }
    add_action( 'init', 'cba_disable_extra_image_sizes' );
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
    function cba_remove_deregister_scripts(){
      wp_deregister_script( 'wp-embed' );
    }
    add_action( 'wp_footer', 'cba_remove_deregister_scripts' );
}

// remove include svg icons
if ($disable_svg_icons === true){
    remove_action( 'wp_footer', 'twentyseventeen_include_svg_icons', 9999 );
}

// Remove update notifications Without error notices
function cba_remove_core_updates () {
    global $wp_version;
    return(object) array(
        'last_checked'    => time(),
        'version_checked' => $wp_version,
        'updates'         => array()
    );
}
if ($disable_update_core === true){
    // Remove update notifications for core.
    add_filter('pre_site_transient_update_core','__return_null');
    // Remove update notifications Without error notices for core
    add_filter('pre_site_transient_update_core','cba_remove_core_updates');
}

if ($disable_update_plugins === true){
    // Remove update notifications for plugins.
    add_filter('pre_site_transient_update_plugins','__return_null');
    // Remove update notifications Without error notices for plugins
    add_filter('pre_site_transient_update_plugins','cba_remove_core_updates');
}

if ($disable_update_themes === true){
    // Remove update notifications for themes.
    add_filter('pre_site_transient_update_themes','__return_null');
    // Remove update notifications Without error notices for themes
    add_filter('pre_site_transient_update_themes','cba_remove_core_updates');
}

if ($disable_check_version_core === true){
    // APIによるバージョンチェックの通信をさせない
    remove_action('wp_version_check', 'wp_version_check');
    remove_action('admin_init', '_maybe_update_core');
}


add_action( 'admin_menu', function(){
    global $remove_menu_page_dashboard;
    global $remove_menu_page_jetpack;
    global $remove_menu_page_posts;
    global $remove_menu_page_media;
    global $remove_menu_page_pages;
    global $remove_menu_page_comments;
    global $remove_menu_page_appearance;
    global $remove_menu_page_appearance_customize;
    global $remove_menu_page_appearance_widgets;
    global $remove_menu_page_appearance_menu;
    global $remove_menu_page_plugins;
    global $remove_menu_page_users;
    global $remove_menu_page_tools;
    global $remove_menu_page_settings;
    global $remove_menu_page_settings_writing;
    global $remove_menu_page_settings_reading;
    global $remove_menu_page_settings_discussion;
    global $remove_menu_page_settings_media;
    global $remove_menu_page_settings_permalink;
    global $remove_menu_page_settings_privacy;

    if ($remove_menu_page_dashboard === true)
        remove_menu_page( 'index.php' ); // Dashboard
    if ($remove_menu_page_jetpack === true)
        remove_menu_page( 'jetpack' ); // Jetpack*
    if ($remove_menu_page_posts === true)
        remove_menu_page( 'edit.php' ); // Posts
    if ($remove_menu_page_media === true)
        remove_menu_page( 'upload.php' ); // Media
    if ($remove_menu_page_pages === true)
        remove_menu_page( 'edit.php?post_type=page' ); // Pages
    if ($remove_menu_page_comments === true)
        remove_menu_page( 'edit-comments.php' ); // Comments
    if ($remove_menu_page_appearance === true)
        remove_menu_page( 'themes.php' ); // Appearance
    if ($remove_menu_page_appearance_customize === true)
        remove_submenu_page( 'themes.php', 'customize.php' ); // Appearance-customize
    if ($remove_menu_page_appearance_widgets === true)
        remove_submenu_page( 'themes.php', 'widgets.php' ); // Appearance-widgets
    if ($remove_menu_page_appearance_menu === true)
        remove_submenu_page( 'themes.php', 'nav-menus.php' ); // Appearance-menu
    if ($remove_menu_page_plugins === true)
        remove_menu_page( 'plugins.php' ); // Plugins
    if ($remove_menu_page_users === true)
        remove_menu_page( 'users.php' ); // Users
    if ($remove_menu_page_tools === true)
        remove_menu_page( 'tools.php' ); // Tools
    if ($remove_menu_page_settings === true)
        remove_menu_page( 'options-general.php' ); // Settings
    if ($remove_menu_page_settings_writing === true)
        remove_submenu_page( 'options-general.php', 'options-writing.php' ); // Settings-writing
    if ($remove_menu_page_settings_reading === true)
        remove_submenu_page( 'options-general.php', 'options-reading.php' ); // Settings-reading
    if ($remove_menu_page_settings_discussion === true)
        remove_submenu_page( 'options-general.php', 'options-discussion.php' ); // Settings-discussion
    if ($remove_menu_page_settings_media === true)
        remove_submenu_page( 'options-general.php', 'options-media.php' ); // Settings-media
    if ($remove_menu_page_settings_permalink === true)
        remove_submenu_page( 'options-general.php', 'options-permalink.php' ); // Settings-permalink
    if ($remove_menu_page_settings_privacy === true)
        remove_submenu_page( 'options-general.php', 'privacy.php' ); // Settings-privacy
} );

/**
 * Hide editor on specific pages.
 *
 */
add_action( 'admin_init', function() {
    global $disable_editor_by_post;
    global $disable_editor_by_page;
    global $disable_editor_by_template;
    $post_id = isset($_GET['post']) ? $_GET['post'] : 0 ;

    if ($disable_editor_by_page === true){
        remove_post_type_support('page', 'editor');
    }

    if ($disable_editor_by_post === true){
        remove_post_type_support('post', 'editor');
    }

    // Hide the editor on a page with a specific page template
    // Get the name of the Page Template file.
    $template_file = get_post_meta($post_id, '_wp_page_template', true);
    if (!empty($disable_editor_by_template_args) && in_array($template_file, $disable_editor_by_template_args)){
        remove_post_type_support('page', 'editor');
    }
});
