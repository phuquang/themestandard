<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Theme_Standard
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<main class="container">
    <h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'themestandard' ); ?></h1>
    <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'themestandard' ); ?> </p>
    <?php get_search_form(); ?>
</main>
<?php get_footer();
