<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Theme_Standard
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<main class="container">
<?php
if ( have_posts() ) :
        the_archive_title( '<h1 class="page-title">', '</h1>' );
        the_archive_description( '<div class="taxonomy-description">', '</div>' );
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

    get_template_part( 'template-parts/content', 'none' );

endif;

get_sidebar(); ?>
</main>
<?php get_footer();
