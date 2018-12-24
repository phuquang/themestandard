<?php
get_header(); ?>
    <main class="container">
    <?php 
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
