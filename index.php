<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Theme_Standard
 * @since 1.0
 * @version 1.0
 */

get_header();

    if ( is_home() && ! is_front_page() ) :
        single_post_title();
    else :
        _e( 'Posts', 'twentyseventeen' );
    endif;

    if ( have_posts() ) :

        /* Start the Loop */
        while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content', get_post_format() );

        endwhile;

        the_post_navigation(
            array(
                'prev_text' => __( 'Previous Post', 'twentyseventeen' ),
                'next_text' => __( 'Next Post', 'twentyseventeen' ),
            )
        );

    else :

        get_template_part( 'template-parts/post/content', 'none' );

    endif;

    get_sidebar();

get_footer();
