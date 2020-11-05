<?php
/**
 * Require other php file
 *
 * @package WordPress
 * @subpackage Theme_Standard
 * @since 1.0
 * @version 1.0
 */
// require get_parent_theme_file_path( '/inc/libraries/disable-feature.php' );
require get_parent_theme_file_path( '/inc/libraries/helper.php' );
require get_parent_theme_file_path( '/inc/libraries/QNP_Pagination.php' );
// require get_parent_theme_file_path( '/inc/libraries/theme-debug.php' );

// Pagination functions
require get_parent_theme_file_path( '/inc/pagination.php' );

// Helper functions
require get_parent_theme_file_path( '/inc/helper.php' );

// Redirect functions
// require get_parent_theme_file_path( '/inc/redirect.php' );

// Change default feature in wordpress
// require get_parent_theme_file_path( '/inc/disable.php' );

/**
 * Register Post Type
 */
// Post type sample
// require get_parent_theme_file_path( '/inc/registers/posttype-sample.php' );

/**
 * Register Sidebar
 */
// Sidebar sample
require get_parent_theme_file_path( '/inc/registers/sidebar-sample.php' );

/**
 * Register Widgets
 */
// Widgets sample
// require get_parent_theme_file_path( '/inc/widgets/sample.php' );

/**
 * Register Metaboxes
 */
// Editor code for template page
// require get_parent_theme_file_path( '/inc/metaboxes/edit-template-page.php' );

/**
 * Custom SEO tags
 */
// require get_parent_theme_file_path( '/inc/seo.php' );

/**
 * Page options
 */
// require get_parent_theme_file_path( '/inc/options/theme-settings.php' );
// require get_parent_theme_file_path( '/inc/options/theme-settings-child.php' );

/**
 * Setup theme
 */
require get_parent_theme_file_path( '/inc/setup.php' );

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/classes/class-wp-bootstrap-navwalker.php';
	require_once get_template_directory() . '/classes/class-wp-bootstrap-comment-walker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );
