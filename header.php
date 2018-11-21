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
<?php do_action('cba_head_before') ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php if(! wp_is_mobile()): ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php endif; ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<title><?php wp_title( '｜', true, 'right' ) ?></title>
<?php wp_head(); ?>
<?php do_action('cba_head_after') ?>
</head>
<body <?php if (WP_DEBUG){ body_class(); } ?> id="<?php do_action('cba_body_id') ?>">
<?php do_action('cba_body_before') ?>
    <header></header>
