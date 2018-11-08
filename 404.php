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

get_header();

    _e( 'Oops! That page can&rsquo;t be found.', 'twentyseventeen' );

    _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyseventeen' );

    get_search_form();

get_footer();
