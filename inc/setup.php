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
     * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/themestandard
     * If you're building a theme based on Twenty Seventeen, use a find and replace
     * to change 'themestandard' to the name of your theme in all the template files.
     */
    // load_theme_themestandard( TEXT_DOMAIN, get_template_directory() . '/languages' );

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
            'primary' => __( 'Primary', 'themestandard' ),
            'footer'  => __( 'Footer Menu', 'themestandard' ),
            'social'  => __( 'Social Links Menu', 'themestandard' ),
        )
    );

    // Set content-width.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 580;
	}

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

    // Add support for Block Styles. (wp-block-library-theme-css)
    // add_theme_support( 'wp-block-styles' );

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
                'name'      => __( 'Small', 'themestandard' ),
                'shortName' => __( 'S', 'themestandard' ),
                'size'      => 19.5,
                'slug'      => 'small',
            ),
            array(
                'name'      => __( 'Normal', 'themestandard' ),
                'shortName' => __( 'M', 'themestandard' ),
                'size'      => 22,
                'slug'      => 'normal',
            ),
            array(
                'name'      => __( 'Large', 'themestandard' ),
                'shortName' => __( 'L', 'themestandard' ),
                'size'      => 36.5,
                'slug'      => 'large',
            ),
            array(
                'name'      => __( 'Huge', 'themestandard' ),
                'shortName' => __( 'XL', 'themestandard' ),
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
                'name'  => __( 'Primary', 'themestandard' ),
                'slug'  => 'primary',
                'color' => get_theme_mod( 'primary_color_hue', 199 ),
            ),
            array(
                'name'  => __( 'Secondary', 'themestandard' ),
                'slug'  => 'secondary',
                'color' => get_theme_mod( 'primary_color_hue', 199 ),
            ),
            array(
                'name'  => __( 'Dark Gray', 'themestandard' ),
                'slug'  => 'dark-gray',
                'color' => '#111',
            ),
            array(
                'name'  => __( 'Light Gray', 'themestandard' ),
                'slug'  => 'light-gray',
                'color' => '#767676',
            ),
            array(
                'name'  => __( 'White', 'themestandard' ),
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
    $libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'themestandard' );

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
    wp_enqueue_style( TEXT_DOMAIN . '-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
    // wp_style_add_data( TEXT_DOMAIN . '-style', 'rtl', 'replace' );

    wp_enqueue_script( TEXT_DOMAIN . '-jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', array(), '3.5.1', false );

    // bootstrap
    wp_enqueue_style( TEXT_DOMAIN . '-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css', array(), '4.5.3' );
    wp_enqueue_script( TEXT_DOMAIN . '-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js', array(), '4.5.3', false );

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

add_action('wp_head', function () {
?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php if (! wp_is_mobile()) : ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php endif;
}, 0);

/**
 * Print global variable url in javascript
 */
add_action('wp_head', function () {
?>
<script type="text/javascript">
var urls = {
    home : "<?php url() ?>",
    theme : "<?php themeUrl() ?>",
    assets : "<?php assets() ?>",
}
</script>
<?php
}, 999);
