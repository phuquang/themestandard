<?php
$class = !empty($args['class'])?$args['class']:'';
//for use in the loop, list 5 post titles related to first tag on current post
$args=array(
    'paged'=>1,
    'posts_per_page'=> 4,
);
$query = new WP_Query($args);
if( $query->have_posts() ) {
?>
<div class="single-temp-articles <?php echo $class ?>">
    <h3>Related articles</h3>
    <div class="">
        <?php
        while ($query->have_posts()) : $query->the_post(); ?>
        <div class="media">
            <?php the_post_thumbnail('post-thumbnail',['class' => 'img-fluid mr-3']) ?>
            <div class="media-body">
                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?><br><small><?php the_time( get_option( 'date_format' ) ); ?></small>
                </a>
            </div>
        </div>
        <?php
        endwhile;
        ?>
    </div>
</div>
<?php
}
wp_reset_query();
?>
