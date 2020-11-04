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

get_header(); ?>
    <main class="container">
    <?php
    /* Start the Loop */
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'post' );

        the_post_navigation(
            array(
                'prev_text' => __( 'Previous Post', 'themestandard' ),
                'next_text' => __( 'Next Post', 'themestandard' ),
            )
        );

    endwhile; // End of the loop.

    get_sidebar();
    ?>
    </main>
<?php get_footer();
