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
            get_template_part( 'template-parts/global', 'breadcrumbs' );

            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'post' );

            endwhile;

            get_template_part( 'template-parts/section', 'related-articles' );
            ?>
        </div>
        <div class="col col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>
<?php get_footer();
