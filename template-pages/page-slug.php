<?php
add_action('cba_head_after', function(){
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.js" media="all">
<script type='text/javascript' src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>
<?php
});

add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'page-slug-stype', get_theme_file_uri( '/assets/css/style.css' ), null, '1.0' );
    wp_enqueue_script( 'page-slug-script', get_theme_file_uri( '/assets/js/script.js' ), null, '1.0', false );
});

add_action('cba_body_id', function(){ echo 'pageHome'; });

get_header();

// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) {
    comments_template();
}

get_sidebar();
get_footer();

