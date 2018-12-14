<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Theme_Standard
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<main class="container">
    <?php if ( have_posts() ) :
        printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' );
    else :
        _e( 'Nothing Found', 'twentyseventeen' );
    endif;

    if ( have_posts() ) :
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content', get_post_format() );

        endwhile; // End of the loop.

        global $wp_query;

        the_pagination(array(
            'paged' => $wp_query->query['paged'],
            'max_num_pages' => $wp_query->max_num_pages,
            'found_posts' => $wp_query->found_posts,
            'posts_per_page' => $wp_query->posts_per_page,
        ));
        
        _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); 
        _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); 
        _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); 
        _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); 
        _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); 
        _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); 
    else :

        _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); 
        get_search_form();

    endif;
    get_sidebar(); ?>
</main>
<?php get_footer();
