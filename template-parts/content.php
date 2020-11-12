<article <?php post_class('card mb-3'); ?> id="post-<?php the_ID(); ?>">
    <?php the_post_thumbnail('post-thumbnail',['class' => 'img-responsive responsive--full card-img-top']) ?>
    <div class="card-body">
        <h5 class="card-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
        <div class="card-text"><?php the_excerpt(); ?></div>
        <?php edit_post_link(); ?>
    </div>
</article><!-- .post -->
