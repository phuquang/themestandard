<?php
add_action('cba_head_after', function(){
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.js" media="all">
<script type='text/javascript' src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>
<?php
});

get_header();

// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) {
    comments_template();
}

get_sidebar();
get_footer();

