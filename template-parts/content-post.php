<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php the_post_thumbnail('post-thumbnail',['class' => 'img-responsive responsive--full card-img-top']) ?>

	<h1><?php the_title() ?></h1>
	<div>
		<?php
		if (has_category()) {
			the_category( ', ' );
		}

		// Author.
		if ( post_type_supports( get_post_type(), 'author' ) ) {
			?>
			<li class="post-author meta-wrapper">
				<span class="meta-text">
					<?php
					printf(
						/* translators: %s: Author name. */
						__( 'By %s', 'twentytwenty' ),
						'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author_meta( 'display_name' ) ) . '</a>'
					);
					?>
				</span>
			</li>
			<?php

		}
		?>
			<li class="post-date meta-wrapper">
				<span class="meta-text">
					<a href="<?php the_permalink(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
				</span>
			</li>
		<?php
		// Tags.
		if ( has_tag() ) {
			?>
			<li class="post-tags meta-wrapper">
				<span class="meta-text">
					<?php the_tags( '', ', ', '' ); ?>
				</span>
			</li>
			<?php
		}

		// Comments link.
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			?>
			<li class="post-comment-link meta-wrapper">
				<span class="meta-text">
					<?php comments_popup_link(); ?>
				</span>
			</li>
			<?php
		}
		// Sticky.
		if ( is_sticky() ) {
			?>
			<li class="post-sticky meta-wrapper">
				<span class="meta-text">
					<?php _e( 'Sticky post', 'twentytwenty' ); ?>
				</span>
			</li>
			<?php
		}
		?>
	</div>
	<div class="content">
		<?php the_content(); ?>
	</div>

	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'themestandard' ) . '"><span class="label">' . __( 'Pages:', 'themestandard' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		edit_post_link();
		?>
	</div>
	<?php


	/**
	 *  Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 * */
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>

		<div class="comments-wrapper section-inner">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php
	}
	?>

</article><!-- .post -->
