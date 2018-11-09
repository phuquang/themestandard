<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Theme_Standard
 * @since 1.0
 * @version 1.0
 */

get_header();

// Start the loop.
while ( have_posts() ) : the_post();

    // Include the page content template.
    get_template_part( 'template-pages/page', get_post_field( 'post_name') );

    // End of the loop.
endwhile;

get_footer();