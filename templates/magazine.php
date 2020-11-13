<?php
/**
 * Template Name: Magazine Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Theme_Standard
 * @since 1.0
 */

get_header(); ?>

<main class="app_container container template-magazine">
    <div class="row">
        <div class="col col-md-6"><?php get_template_part( 'template-parts/section', 'post', array('class'=>'style2') ); ?></div>
        <div class="col col-md-3"><?php get_template_part( 'template-parts/section', 'post', array('class'=>'style2') ); ?></div>
        <div class="col col-md-3"><?php get_template_part( 'template-parts/section', 'post' ); ?></div>
    </div>
    <div class="row">
        <div class="col">
            <?php get_template_part( 'template-parts/section', 'post', array('class'=>'style1') ); ?>
            <?php get_template_part( 'template-parts/section', 'post', array('class'=>'style1') ); ?>
        </div>
        <div class="col">
            <?php get_template_part( 'template-parts/section', 'post', array('class'=>'style1') ); ?>
            <?php get_template_part( 'template-parts/section', 'post', array('class'=>'style1') ); ?>
        </div>
        <div class="col">
            <?php get_template_part( 'template-parts/section', 'post', array('class'=>'style1') ); ?>
            <?php get_template_part( 'template-parts/section', 'post', array('class'=>'style1') ); ?>
        </div>
    </div>
</main>

<?php get_footer();
