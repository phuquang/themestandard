<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Theme_Standard
 * @since 1.0
 * @version 1.0
 */

get_header(); 

    /* Start the Loop */
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', get_post_format() );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

        the_post_navigation(
            array(
                'prev_text' => __( 'Previous Post', 'twentyseventeen' ),
                'next_text' => __( 'Next Post', 'twentyseventeen' ),
            )
        );

    endwhile; // End of the loop.

    get_sidebar();

get_footer();
