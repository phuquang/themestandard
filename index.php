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

get_header(); ?>
<main class="app_container container">
    <div class="row">
        <div class="col col-md-8">
            <?php
            if ( have_posts() ) :

                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content' );

                endwhile;

                the_bootstrap_paginate_links();

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>
        </div>
        <div class="col col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>
<?php get_footer();
