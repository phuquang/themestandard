<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Theme_Standard
 * @since 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-1' ) ); ?>

<form role="search" method="get" class="form-inline my-2 my-lg-0" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="<?php echo $unique_id; ?>">Search for:</label>
    <input type="search" id="<?php echo $unique_id; ?>" class="form-control ml-sm-2 mr-sm-2" placeholder="Search &hellip;" value="<?php echo get_search_query(); ?>" name="s" />
    <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
</form>
