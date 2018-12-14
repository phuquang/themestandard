<?php
/**
 * Require other php file
 *
 * @package WordPress
 * @subpackage Theme_Standard
 * @since 1.0
 * @version 1.0
 */

// Pagination functions
require get_parent_theme_file_path( '/inc/pagination.php' );

// Helper functions
require get_parent_theme_file_path( '/inc/helper.php' );

// Redirect functions
require get_parent_theme_file_path( '/inc/redirect.php' );

// Change default feature in wordpress
require get_parent_theme_file_path( '/inc/disable-feature.php' );

/**
 * Register Post Type
 */
// Post type sample
require get_parent_theme_file_path( '/inc/registers/posttype-sample.php' );

/**
 * Register Sidebar
 */
// Sidebar sample
require get_parent_theme_file_path( '/inc/registers/sidebar-sample.php' );

/**
 * Register Widgets
 */
// Widgets sample
require get_parent_theme_file_path( '/inc/widgets/sample.php' );

/**
 * Register Metaboxes
 */
// Editor code for template page
require get_parent_theme_file_path( '/inc/metaboxes/edit-template-page.php' );

/**
 * Custom SEO tags
 */
require get_parent_theme_file_path( '/inc/custom-seo.php' );

/**
 * Page options
 */
// require get_parent_theme_file_path( '/inc/theme-options/theme-settings.php' );
// require get_parent_theme_file_path( '/inc/theme-options/theme-settings-child.php' );

/**
 * Setup theme
 */
require get_parent_theme_file_path( '/inc/setup.php' );

// Theme debug
require get_parent_theme_file_path( '/inc/theme-debug.php' );
