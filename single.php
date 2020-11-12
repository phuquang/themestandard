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
<main class="app_container container">
    <div class="row">
        <div class="col col-md-8">
            <?php
            /* Start the Loop */
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'post' );

                the_post_navigation(
                    array(
                        'class'     => 'app_post_navigation',
                        'prev_text' => __( 'Previous Post: %title', 'themestandard' ),
                        'next_text' => __( 'Next Post: %title', 'themestandard' ),
                    )
                );

            endwhile; // End of the loop.
            ?>
        </div>
        <div class="col col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>
<?php get_footer();
