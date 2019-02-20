<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
add_action( 'after_setup_theme', function () {

    /*
     * Make theme available for translation.
     * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
     * If you're building a theme based on Twenty Seventeen, use a find and replace
     * to change 'twentyseventeen' to the name of your theme in all the template files.
     */
    load_theme_textdomain( TEXT_DOMAIN, get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );
    // set_post_thumbnail_size( 1568, 9999 );

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus(
        array(
            'primary' => __( 'Primary', 'twentynineteen' ),
            'footer'  => __( 'Footer Menu', 'twentynineteen' ),
            'social'  => __( 'Social Links Menu', 'twentynineteen' ),
        )
    );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 190,
            'width'       => 190,
            'flex-width'  => false,
            'flex-height' => false,
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for Block Styles.
    add_theme_support( 'wp-block-styles' );

    // Add support for full and wide align images.
    add_theme_support( 'align-wide' );

    // Add support for editor styles.
    add_theme_support( 'editor-styles' );

    // Enqueue editor styles.
    add_editor_style( 'style-editor.css' );

    // Add custom editor font sizes.
    add_theme_support(
        'editor-font-sizes',
        array(
            array(
                'name'      => __( 'Small', 'twentynineteen' ),
                'shortName' => __( 'S', 'twentynineteen' ),
                'size'      => 19.5,
                'slug'      => 'small',
            ),
            array(
                'name'      => __( 'Normal', 'twentynineteen' ),
                'shortName' => __( 'M', 'twentynineteen' ),
                'size'      => 22,
                'slug'      => 'normal',
            ),
            array(
                'name'      => __( 'Large', 'twentynineteen' ),
                'shortName' => __( 'L', 'twentynineteen' ),
                'size'      => 36.5,
                'slug'      => 'large',
            ),
            array(
                'name'      => __( 'Huge', 'twentynineteen' ),
                'shortName' => __( 'XL', 'twentynineteen' ),
                'size'      => 49.5,
                'slug'      => 'huge',
            ),
        )
    );

    // Editor color palette.
    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name'  => __( 'Primary', 'twentynineteen' ),
                'slug'  => 'primary',
                'color' => get_theme_mod( 'primary_color_hue', 199 ),
            ),
            array(
                'name'  => __( 'Secondary', 'twentynineteen' ),
                'slug'  => 'secondary',
                'color' => get_theme_mod( 'primary_color_hue', 199 ),
            ),
            array(
                'name'  => __( 'Dark Gray', 'twentynineteen' ),
                'slug'  => 'dark-gray',
                'color' => '#111',
            ),
            array(
                'name'  => __( 'Light Gray', 'twentynineteen' ),
                'slug'  => 'light-gray',
                'color' => '#767676',
            ),
            array(
                'name'  => __( 'White', 'twentynineteen' ),
                'slug'  => 'white',
                'color' => '#FFF',
            ),
        )
    );

    // Add support for responsive embedded content.
    add_theme_support( 'responsive-embeds' );

});


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
    // Theme stylesheet.
    // wp_enqueue_style( TEXT_DOMAIN . '-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
    // wp_style_add_data( TEXT_DOMAIN . '-style', 'rtl', 'replace' );

    wp_enqueue_script( TEXT_DOMAIN . '-jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', array(), '3.3.1', false );
    wp_enqueue_script( TEXT_DOMAIN . '-popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array(), '1.14.3', false );

    // bootstrap
    wp_enqueue_style( TEXT_DOMAIN . '-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', array(), '4.1.3' );
    wp_enqueue_script( TEXT_DOMAIN . '-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array(), '4.1.3', false );

    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style( TEXT_DOMAIN . '-fonts', themestandard_fonts_url(), array(), null );

    // Load the Internet Explorer 8 specific stylesheet.
    wp_enqueue_style( TEXT_DOMAIN . '-ie8', getAssets() .'/css/ie8.css', array( TEXT_DOMAIN . '-style' ), '1.0' );
    wp_style_add_data( TEXT_DOMAIN . '-ie8', 'conditional', 'lt IE 9' );

    // Load the html5 shiv.
    wp_enqueue_script( TEXT_DOMAIN . '-html5', getAssets() . '/js/html5.js', array(), '1.0' );
    wp_script_add_data( TEXT_DOMAIN . '-html5', 'conditional', 'lt IE 9' );

    wp_enqueue_style( TEXT_DOMAIN . '-style', getAssets() . '/css/style.css', array(), '1.0' );
    wp_enqueue_script( TEXT_DOMAIN . '-script', getAssets() . '/js/script.js', array(), '1.0', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
});

/**
 * Print global variable url in javascript
 */
add_action('cba_head_after',function(){ ?>
<script type="text/javascript">
var urls = {
home : "<?php url() ?>",
theme : "<?php themeUrl() ?>",
assets : "<?php assets() ?>",
}
</script>
<?php });
