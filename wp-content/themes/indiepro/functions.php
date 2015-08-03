<?php
/**
 * indiepro functions and definitions
 *
 * @package indiepro
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 940; /* pixels */
}

if ( ! function_exists( 'indiepro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function indiepro_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on indiepro, use a find and replace
	 * to change 'indiepro' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'indiepro', get_template_directory() . '/languages' );

	// Feed Links
	add_theme_support( 'automatic-feed-links' );
	
	// Post formats
	add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'quote' ) );

	// Post thumbnails
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'full-thumb', 940, 0, true );
	add_image_size( 'slider-thumb', 650, 440, true );
	add_image_size( 'thumb', 440, 294, true );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'indiepro' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	
	/**
	 * Display Title in theme
	 */
	add_theme_support( 'title-tag' );
	
	
}
endif; // indiepro_setup
add_action( 'after_setup_theme', 'indiepro_setup' );

/**
 * Load theme updater functions.
 * Action is used so that child themes can easily disable.
 */
function indiepro_theme_updater() {
	require( get_template_directory() . '/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'indiepro_theme_updater' );


/**
 * Author Social Links
 */
function indiepro_contactmethods( $contactmethods ) {

	$contactmethods['twitter']   = __('Twitter Username','indiepro');
	$contactmethods['facebook']  = __('Facebook Username','indiepro');
	$contactmethods['google']    = __('Google Plus Username','indiepro');
	$contactmethods['tumblr']    = __('Tumblr Username','indiepro');
	$contactmethods['instagram'] = __('Instagram Username','indiepro');
	$contactmethods['pinterest'] = __('Pinterest Username','indiepro');

	return $contactmethods;
}
add_filter('user_contactmethods','indiepro_contactmethods',10,1);


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function indiepro_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'indiepro' ),
		'id'            => 'sidebar-1',
        'description'   => __( 'Main sidebar that appears on the left or right.', 'indiepro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    register_sidebar( array(
		'name' => __( 'Footer 1', 'indiepro' ),
		'id' => 'footer-1',
        'description'   => __( 'One of three widget areas that will apear at the bottom of the site.', 'indiepro' ),
		'before_widget' => '<aside id="%1$s" class="widget first %2$s"><div class="widget-wrap">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
    register_sidebar( array(
		'name' => __( 'Footer 2', 'indiepro' ),
		'id' => 'footer-2',
        'description'   => __( 'One of three widget areas that will apear at the bottom of the site.', 'indiepro' ),
		'before_widget' => '<aside id="%1$s" class="widget first %2$s"><div class="widget-wrap">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',        
	) );
    register_sidebar( array(
		'name' => __( 'Footer 3', 'indiepro' ),
		'id' => 'footer-3',
        'description'   => __( 'One of three widget areas that will apear at the bottom of the site.', 'indiepro' ),
		'before_widget' => '<aside id="%1$s" class="widget first %2$s"><div class="widget-wrap">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'widgets_init', 'indiepro_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function indiepro_scripts() {
	
	//STYLESHEETS
	wp_enqueue_style('indiepro-style', get_stylesheet_uri() . '?v='.time(), array(), false, 'all' );
	wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css');
	wp_enqueue_style('owl-theme', get_template_directory_uri() . '/css/owl.theme.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style('flexslider', get_template_directory_uri() . '/css/flexslider.css');

	//SCRIPTS
	wp_enqueue_script('indiepro-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script('indiepro-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script('jquery-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '', true);
	wp_enqueue_script('jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '', true);
	wp_enqueue_script('jquery-tooltipsy', get_template_directory_uri() . '/js/tooltipsy.jquery.js', array('jquery'), '', true);
	wp_enqueue_script('jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), '', true);
	wp_enqueue_script('jquery-inview', get_template_directory_uri() . '/js/inview.min.js', array('jquery'), '', true);
	wp_enqueue_script('indiepro_scripts', get_template_directory_uri() . '/js/indiepro.js', array('jquery'), NULL, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'indiepro_scripts' );


/**
 * Include files
 */

//Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';

// Masonry
include get_template_directory() . '/inc/masonry.php';

// Theme Options
include('functions/customizer_controller.php');
include('functions/customizer_settings.php');
include('functions/customizer_styles.php');


/**
 * Exclude Featured Category
 */
function indiepro_category($separator) {
	
	if(get_theme_mod( 'indiepro_featured_cat_hide' ) == true) {
		
		$excluded_cat = get_theme_mod('indiepro_featured_cat');
		
		$first_time = 1;
		foreach((get_the_category()) as $category) {
			if ($category->cat_ID != $excluded_cat) {
				if ($first_time == 1) {
					echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "indiepro" ), $category->name ) . '" ' . '>'  . $category->name.'</a>';
					$first_time = 0;
				} else {
					echo $separator . '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "indiepro" ), $category->name ) . '" ' . '>' . $category->name.'</a>';
				}
			}
		}
	
	} else {
		
		$first_time = 1;
		foreach((get_the_category()) as $category) {
			if ($first_time == 1) {
				echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "indiepro" ), $category->name ) . '" ' . '>'  . $category->name.'</a>';
				$first_time = 0;
			} else {
				echo $separator . '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "indiepro" ), $category->name ) . '" ' . '>' . $category->name.'</a>';
			}
		}
	
	}
}

/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );


/**
 * The Excerpt
 */
function indiepro_custom_excerpt_length( $length ) {
	return 19;
}
add_filter( 'excerpt_length', 'indiepro_custom_excerpt_length', 999 );

function indiepro_new_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'indiepro_new_excerpt_more' );

/**
 * Include Google Fonts
 */
function indiepro_google_fonts() {
	
	// Add Google Font stylesheets
	$array_font_sections = array(
		'font_site_title',
		'font_site_tagline',
		'font_body',
		'font_headers',
		'font_site_nav',
	);

	$fonts = '';
    $enqueueFonts = 0;
	foreach($array_font_sections as $id => $section)
	{

		if(get_theme_mod($array_font_sections[$id].'_display'))
		{
			$family = get_theme_mod($array_font_sections[$id]);
			$weight = get_theme_mod($array_font_sections[$id].'_weight');

			$fonts .= '|'.$family;

			if($weight)
			{
				$fonts .= ':'.$weight;
			}
			$enqueueFonts = 1;
		}
	}
    if($enqueueFonts == 1){
        $fonts = ltrim($fonts, '|');
        $url = add_query_arg('family', urlencode($fonts), "//fonts.googleapis.com/css" );
        wp_enqueue_style('indiepro-google-fonts', $url);
    } else{
        // Return nothing if google fonts have not been selected from the customizer.
        return;
    }
}
add_action('wp_enqueue_scripts', 'indiepro_google_fonts');

/**
 * Title tag fallback
 */
if ( ! function_exists( '_wp_render_title_tag' ) ) :
    function indiepro_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
    }
    add_action( 'wp_head', 'indiepro_render_title' );
endif;


/**
 * Suggested Plugins
 */
require_once get_template_directory() . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'indiepro_register_required_plugins' );

function indiepro_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

       array(
            'name'               => 'Vafpress Post Formats UI', // The plugin name.
            'slug'               => 'vp-post-formats-ui', // The plugin slug (typically the folder name).
            'source'             => 'https://github.com/vafour/vafpress-post-formats-ui/archive/develop.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}