<?php
//for use in the loop, list 5 post titles related to first tag on current post
$tags = wp_get_post_tags($post->ID);
if ($tags) {
	$first_tag = $tags[0]->term_id;
	$args=array(
		'tag__in' => array($first_tag),
		'post__not_in' => array($post->ID),
		'posts_per_page'=> 4,
	);
	$query = new WP_Query($args);
	if( $query->have_posts() ) {
	?>
	<div class="single-related-articles">
		<h3>Related articles</h3>
		<div class="related-articles-list">
			<?php
			while ($query->have_posts()) : $query->the_post(); ?>
			<div class="media">
				<?php the_post_thumbnail('post-thumbnail',['class' => 'img-fluid mr-3']) ?>
				<div class="media-body">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
						<?php the_title(); ?><br><?php the_time( get_option( 'date_format' ) ); ?>
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
}
?>
