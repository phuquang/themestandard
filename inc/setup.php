<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentyseventeen_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
     * If you're building a theme based on Twenty Seventeen, use a find and replace
     * to change 'twentyseventeen' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'nextenergy' );


    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );


    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

}
add_action( 'after_setup_theme', 'twentyseventeen_setup' );

/**
 * Register custom fonts.
 */
function themestandard_fonts_url() {
    $fonts_url = '';

    /*
     * Translators: If there are characters in your language that are not
     * supported by Libre Franklin, translate this to 'off'. Do not translate
     * into your own language.
     */
    $libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );

    if ( 'off' !== $libre_franklin ) {
        $font_families = array();

        $font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', function() {
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style( 'themestandard-fonts', themestandard_fonts_url(), array(), null );

    // Theme stylesheet.
    wp_enqueue_style( 'themestandard-style', get_stylesheet_uri() );


    // Load the Internet Explorer 8 specific stylesheet.
    wp_enqueue_style( 'themestandard-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'themestandard-style' ), '1.0' );
    wp_style_add_data( 'themestandard-ie8', 'conditional', 'lt IE 9' );

    // Load the html5 shiv.
    wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
    wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );


    wp_enqueue_script( 'themestandard-script', get_theme_file_uri( '/assets/js/script.js' ), array( 'jquery' ), '1.0', false );


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
});

add_action('cba_head_after',function(){
?>
<script type="text/javascript">
var urls = {
    home : "<?php url() ?>",
    theme : "<?php themeUrl() ?>",
    assets : "<?php assets() ?>",
}
</script>
<?php
});
