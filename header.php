<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Theme_Standard
 * @since 1.0
 * @version 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php do_action('cba_head_before') ?>
<meta charset="UTF-8">
<?php if(! wp_is_mobile()): ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php endif; ?>
<?php wp_head(); ?>
<script type="text/javascript">
var urlHome="<?php echo site_url() ?>";
var urlThemeTemplate="<?php echo get_template_directory_uri() ?>";
</script>
<?php do_action('cba_head_after') ?>
</head>
<body <?php if (WP_DEBUG){ body_class(); } ?>>
<?php do_action('cba_body_before') ?>
    <header></header>
