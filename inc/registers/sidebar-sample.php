<?php
//「サイドバー」を登録する
add_action( 'widgets_init', function () {
    register_sidebar( array(  //「サイドバー」を登録する
        'name'          => 'サイドバー(上部)',
        'id'            => 'sample',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
} );
