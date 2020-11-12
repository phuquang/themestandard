<?php
$config=[
    'paged' => $_GET['pager'],
    'max_num_pages' => 51,
    'found_posts' => 51*10,
    'posts_per_page'=>10,
];
$pagi = new QNP_Pagination($config);
$pagi->paged_name='pager';
$pagi->label_first=1;
$pagi->label_last=$pagi->total_pages;
$pagi->hide_next = true;
$pagi->hide_previous = true;
$pagi->range = 3;
$pagi->alway_display = 5;
// $pagi->_from_plus = 1;
// $pagi->_to_minus = 1;
if (!empty($_GET['pager']) && $_GET['pager'] <= 4)
    $pagi->hide_first = true;
if (!empty($_GET['pager']) && $_GET['pager'] >= $pagi->total_pages)
    $pagi->hide_previous = true;
$pagi->pagination();
exit;
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
                'prev_text' => __( 'Previous Post', 'themestandard' ),
                'next_text' => __( 'Next Post', 'themestandard' ),
            )
        );

    else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
    get_sidebar(); ?>
    </main>
<?php get_footer();
