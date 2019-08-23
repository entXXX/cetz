<?php
/**
 * blessing theme customizer
 *
 * @package blessing
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blessing_Customize {
	/**
	 * Customize settings
	 *
	 * @var array
	 */
	protected $config = array();

	/**
	 * The class constructor
	 *
	 * @param array $config
	 */
	public function __construct( $config ) {
		$this->config = $config;

		if ( ! class_exists( 'Kirki' ) ) {
			return;
		}

		$this->register();
	}

	/**
	 * Register settings
	 */
	public function register() {
		/**
		 * Add the theme configuration
		 */
		if ( ! empty( $this->config['theme'] ) ) {
			Kirki::add_config(
				$this->config['theme'], array(
					'capability'  => 'edit_theme_options',
					'option_type' => 'theme_mod',
				)
			);
		}

		/**
		 * Add panels
		 */
		if ( ! empty( $this->config['panels'] ) ) {
			foreach ( $this->config['panels'] as $panel => $settings ) {
				Kirki::add_panel( $panel, $settings );
			}
		}

		/**
		 * Add sections
		 */
		if ( ! empty( $this->config['sections'] ) ) {
			foreach ( $this->config['sections'] as $section => $settings ) {
				Kirki::add_section( $section, $settings );
			}
		}

		/**
		 * Add fields
		 */
		if ( ! empty( $this->config['theme'] ) && ! empty( $this->config['fields'] ) ) {
			foreach ( $this->config['fields'] as $name => $settings ) {
				if ( ! isset( $settings['settings'] ) ) {
					$settings['settings'] = $name;
				}

				Kirki::add_field( $this->config['theme'], $settings );
			}
		}
	}

	/**
	 * Get config ID
	 *
	 * @return string
	 */
	public function get_theme() {
		return $this->config['theme'];
	}

	/**
	 * Get customize setting value
	 *
	 * @param string $name
	 *
	 * @return bool|string
	 */
	public function get_option( $name ) {
		if ( ! isset( $this->config['fields'][$name] ) ) {
			return false;
		}

		$default = isset( $this->config['fields'][$name]['default'] ) ? $this->config['fields'][$name]['default'] : false;

		return get_theme_mod( $name, $default );
	}
}

/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function blessing_get_option( $name ) {
	global $blessing_customize;

	if ( empty( $blessing_customize ) ) {
		return false;
	}

	if ( class_exists( 'Kirki' ) ) {
		$value = Kirki::get_option( $blessing_customize->get_theme(), $name );
	} else {
		$value = $blessing_customize->get_option( $name );
	}

	return apply_filters( 'blessing_get_option', $value, $name );
}

/**
 * Move some default sections to `general` panel that registered by theme
 *
 * @param object $wp_customize
 */
function blessing_customize_modify( $wp_customize ) {
	$wp_customize->get_section( 'title_tagline' )->panel     = 'general';
	$wp_customize->get_section( 'static_front_page' )->panel = 'general';
}
add_action( 'customize_register', 'blessing_customize_modify' );

/**
 * Customizer configuration
 */
$blessing_customize = new Blessing_Customize(
	array(
		'theme'    => 'blessing',

		'panels'   => array(
			'general' => array(
				'priority' => 10,
				'title'    => esc_attr__( 'General', 'blessing' ),
			),	
			'header_panel' => array(
				'priority' => 15,
				'title'    => esc_attr__( 'Header', 'blessing' ),
			),			
		),

		'sections' => array(
			'header_layout_section' => array(
				'title'    => esc_attr__( 'Header Layouts', 'blessing' ),
				'description' => '',
				'panel'          => 'header_panel', // Not typically needed.
				'priority'    => 49,
				'capability'  => 'edit_theme_options',
			),
			'header_logo_section' => array(
			    'title'          => esc_attr__( 'Logo', 'blessing' ),
			    'description' => '',
			    'panel'          => 'header_panel', // Not typically needed.
			    'priority'       => 50,
			    'capability'     => 'edit_theme_options',
			),

			'header_social_section' => array(
				'title'    => esc_attr__( 'Socials', 'blessing' ),
				'description' => '',
				'panel'          => 'header_panel', // Not typically needed.
				'priority'    => 60,
				'capability'  => 'edit_theme_options',
			),		

			'header_styling_section' => array(
				'title'    => esc_attr__( 'Styling', 'blessing' ),
				'description' => '',
				'panel'          => 'header_panel', // Not typically needed.
				'priority'    => 61,
				'capability'  => 'edit_theme_options',
			),

			// Section Blog
			'blog_section'     => array(
				'title'       => esc_attr__( 'Blog', 'blessing' ),
				'description' => '',
				'priority'    => 170,
				'capability'  => 'edit_theme_options',
			),

			// Section Footer
			'footer_section'     => array(
				'title'       => esc_attr__( 'Footer', 'blessing' ),
				'description' => '',
				'priority'    => 180,
				'capability'  => 'edit_theme_options',
			),

			// Section Styling
			'styling_section'     => array(
				'title'       => esc_attr__( 'Styling', 'blessing' ),
				'description' => '',
				'priority'    => 190,
				'capability'  => 'edit_theme_options',
			),
			
			'preload_section'     => array(
				'title'       => esc_attr__( 'Preload', 'blessing' ),
				'description' => '',
				'priority'    => 195,
				'capability'  => 'edit_theme_options',
			),

			'miscellaneous_section'     => array(
				'title'       => esc_attr__( 'Miscellaneous', 'blessing' ),
				'description' => '',
				'priority'    => 196,
				'capability'  => 'edit_theme_options',
			),			
		),

		'fields'   => array(

			// Preload
			'preload'     => array(
				'type'        => 'toggle',
				'label'       => esc_attr__( 'Preloader', 'blessing' ),
				'section'     => 'preload_section',
				'default'     => '1',
				'priority'    => 10,
			),
			'preload_logo'    => array(
				'type'     => 'image',
				'label'    => esc_html__( 'Logo Preload', 'blessing' ),
				'section'  => 'preload_section',
				'default'  => trailingslashit( get_template_directory_uri() ) . 'assets/images/logo.png',
				'priority' => 11,
				'active_callback' => array(
					array(
					  	'setting'  => 'preload',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'preload_logo_width'     => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Logo Width', 'blessing' ),
				'section'  => 'preload_section',
				'default'  => 187,
				'priority' => 12,
				'active_callback' => array(
					array(
					  	'setting'  => 'preload',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'preload_logo_height'    => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Logo Height', 'blessing' ),
				'section'  => 'preload_section',
				'default'  => 40,
				'priority' => 13,
				'active_callback' => array(
					array(
					  	'setting'  => 'preload',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'preload_text_color'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Text Color', 'blessing' ),
				'section'  => 'preload_section',
				'default'  => '#f8f8f8',
				'priority' => 14,
				'active_callback' => array(
					array(
					  	'setting'  => 'preload',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'preload_bgcolor'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Color', 'blessing' ),
				'section'  => 'preload_section',
				'default'  => '#212121',
				'priority' => 15,
				'active_callback' => array(
					array(
					  	'setting'  => 'preload',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'preload_typo' => array(
				'type'        => 'typography',
				'label'       => esc_attr__( 'Preload Font', 'blessing' ),
				'section'     => 'preload_section',
				'default'     => array(
					'font-family'    => 'Open Sans',
					'variant'        => 'regular',
					'font-size'      => '13px',
					'line-height'    => '40px',
					'letter-spacing' => '2px',
					'subsets'        => array( 'latin-ext' ),
					'color'          => '#f8f8f8',
					'text-transform' => 'none',
					'text-align'     => 'center'
				),
				'priority'    => 16,
				'output'      => array(
					array(
						'element' => '#royal_preloader.royal_preloader_logo .royal_preloader_percentage',
					),
				),
			),			

			// Header Layouts
			'sticky_header'    => array(
				'type'     => 'checkbox',
				'label'    => esc_attr__( 'Sticky Header?', 'blessing' ),
				'description' => esc_attr__( 'Default: Header is Sticky when scroll page down.', 'blessing' ),
				'section'     => 'header_layout_section',
				'default'     => true,
				'priority'    => 1,				
			),
			'header_layout'    => array(
				'type'        => 'select',
				'label'       => esc_attr__( 'Header Layouts', 'blessing' ),
				'section'     => 'header_layout_section',
				'default'     => 'header1',
				'priority'    => 2,
				'multiple'    => 1,
				'choices'     => array(
					'header1' => esc_attr__( 'Header Layout 1', 'blessing' ),
					'header2' => esc_attr__( 'Header Layout 2', 'blessing' ),		
				),
			),			

			// Topbar Header
			'info_separator'     => array(
				'type'        => 'custom',
				'label'       => '',
				'section'     => 'header_layout_section',
				'default'     => '<hr>',
				'priority'    => 2,
				'active_callback' => array(
					array(
						'setting'  => 'header_layout',
						'operator' => '==',
						'value'    => 'header2',
					),
					array(
						'setting'  => 'topbar_switch',
						'operator' => '==',
						'value'    => 1,
					),
				),
			),
			'topbar_switch'     => array(
				'type'        => 'toggle',
				'label'       => esc_attr__( 'Topbar On/Off?', 'blessing' ),
				'section'     => 'header_layout_section',
				'default'     => 2,
				'priority'    => 3,
				'active_callback' => array(
					array(
						'setting'  => 'header_layout',
						'operator' => '==',
						'value'    => 'header2',
					),
				),
			),
			
			'header_contact_info'     => array(
				'type'     => 'editor',
				'label'    => esc_html__( 'Contact Info', 'blessing' ),
				'section'  => 'header_layout_section',
				'priority' => 4,
				'active_callback' => array(
					array(
						'setting'  => 'header_layout',
						'operator' => '==',
						'value'    => 'header2',
					),
					array(
						'setting'  => 'topbar_switch',
						'operator' => '==',
						'value'    => 1,
					),
				),				
			),		
			'info_separator2'     => array(
				'type'        => 'custom',
				'label'       => '',
				'section'     => 'header_layout_section',
				'default'     => '<hr>',
				'priority'    => 5,
				'active_callback' => array(
					array(
						'setting'  => 'header_layout',
						'operator' => '==',
						'value'    => 'header2',
					),
					array(
						'setting'  => 'topbar_switch',
						'operator' => '==',
						'value'    => 1,
					),
				),
			),	
			'topbar_text_color'   => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Topbar text color', 'blessing' ),
				'description' => esc_attr__( 'Set your topbar text color.', 'blessing' ),
				'section'  => 'header_layout_section',
				'default'     => '#fff',
				'priority'    => 5,
				'active_callback' => array(
					array(
						'setting'  => 'header_layout',
						'operator' => '==',
						'value'    => 'header2',
					),
					array(
						'setting'  => 'topbar_switch',
						'operator' => '==',
						'value'    => 1,
					),
				),
				'choices'     => array(
					'alpha' => true,
				),
				'output' => array(
					array(
						'element'  => 'header .info, header .info ul.info-list li span, header .info ul.info-list li strong, header .info .social a',
						'property' => 'color',
					),
				),
			),
			'topbar_text_link_color'   => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Topbar text link hover color', 'blessing' ),
				'description' => esc_attr__( 'Set your topbar text link hover color.', 'blessing' ),
				'section'  => 'header_layout_section',
				'default'     => '#8ec92f',
				'priority'    => 6,
				'active_callback' => array(
					array(
						'setting'  => 'header_layout',
						'operator' => '==',
						'value'    => 'header2',
					),
					array(
						'setting'  => 'topbar_switch',
						'operator' => '==',
						'value'    => 1,
					),
				),
				'choices'     => array(
					'alpha' => true,
				),
				'output' => array(
					array(
						'element'  => 'header .info .social a:hover, header .info a:hover',
						'property' => 'color',
					),
				),
			),
			'topbar_border_bottom_color'   => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Topbar border-bottom-color', 'blessing' ),
				'description' => esc_attr__( 'Set your topbar border-bottom-color.', 'blessing' ),
				'section'  => 'header_layout_section',
				'default'     => 'rgba(255,255,255,.2)',
				'priority'    => 7,
				'active_callback' => array(
					array(
						'setting'  => 'header_layout',
						'operator' => '==',
						'value'    => 'header2',
					),
					array(
						'setting'  => 'topbar_switch',
						'operator' => '==',
						'value'    => 1,
					),
				),
				'choices'     => array(
					'alpha' => true,
				),
				'output' => array(
					array(
						'element'  => 'header .info',
						'property' => 'border-bottom-color',
					),
				),
			),
			'topbar_bgcolor'   => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Topbar background color', 'blessing' ),
				'description' => esc_attr__( 'Set your topbar background color.', 'blessing' ),
				'section'  => 'header_layout_section',
				'default'     => 'rgba(255,255,255,0)',
				'priority'    => 8,
				'active_callback' => array(
					array(
						'setting'  => 'header_layout',
						'operator' => '==',
						'value'    => 'header2',
					),
					array(
						'setting'  => 'topbar_switch',
						'operator' => '==',
						'value'    => 1,
					),
				),
				'choices'     => array(
					'alpha' => true,
				),
				'output' => array(
					array(
						'element'  => 'header .info',
						'property' => 'background-color',
					),
				),
			),


			// Header Logo
			'logo'         => array(
				'type'     => 'image',
				'label'    => esc_attr__( 'Logo Static', 'blessing' ),
				'description' => esc_attr__( 'Upload your logo static here', 'blessing' ),
				'section'  => 'header_logo_section',
				'default'  => trailingslashit( get_template_directory_uri() ) . 'assets/images/logo.png',
				'priority' => 51,
			),
			'logo_scroll'         => array(
				'type'     => 'image',
				'label'    => esc_attr__( 'Logo Scroll', 'blessing' ),
				'description' => esc_attr__( 'Upload your logo scroll here, when you scroll down the web page, the logo will be used.', 'blessing' ),
				'section'  => 'header_logo_section',
				'default'  => trailingslashit( get_template_directory_uri() ) . 'assets/images/logo-dark.png',
				'priority' => 51,
			),			
				
			// Header Social
			'social_switch'     => array(
				'type'        => 'toggle',
				'label'       => esc_attr__( 'Social On/Off?', 'blessing' ),
				'section'     => 'header_social_section',
				'default'     => '1',
				'priority'    => 9,
			),
			'header_socials'     => array(
				'type'     => 'repeater',
				'label'    => esc_html__( 'Socials Network', 'blessing' ),
				'section'  => 'header_social_section',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'social_switch',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
				'row_label' => array(
					'type' => 'field',
					'value' => esc_attr__('social', 'blessing' ),
					'field' => 'social_name',
				),
				'default'  => array(),
				'fields'   => array(
					'social_name' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Social network name', 'blessing' ),
						'description' => esc_html__( 'This will be the social network name', 'blessing' ),
						'default'     => '',
					),
					'social_icon' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Icon class name', 'blessing' ),
						'description' => esc_html__( 'This will be the social icon: http://fontawesome.io/icons/', 'blessing' ),
						'default'     => '',
					),
					'social_link' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Link url', 'blessing' ),
						'description' => esc_html__( 'This will be the social link', 'blessing' ),
						'default'     => '',
					),
				),
			),
			'social_target_link'    => array(
				'type'        => 'select',
				'label'       => esc_attr__( 'HTML a target Attribute', 'blessing' ),
				'section'     => 'header_social_section',
				'default'     => '_self',
				'priority'    => 11,
				'multiple'    => 1,
				'active_callback' => array(
					array(
					  	'setting'  => 'social_switch',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
				'choices'     => array(
					'_self' => esc_attr__( 'Same frame', 'blessing' ),
					'_blank' => esc_attr__( 'New window', 'blessing' ),					
					'_parent' => esc_attr__( 'Parent frame', 'blessing' ),
				),
			),
			
			// Header Styling			
			'header_text_color'    => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Header Static Menu Item Color', 'blessing' ),
				'description' => esc_attr__( 'Set your header text color.', 'blessing' ),
				'section'     => 'header_styling_section',
				'default'     => '#ffffff',
				'priority'    => 10,
				'choices'     => array(
					'alpha' => true,
				),
				'output' => array(
					array(
						'element'  => '#mainmenu > li > a, header .social a',
						'property' => 'color',
					),
				),
			),
			'header_scroll_text_color'    => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Header Scroll Menu Item Color', 'blessing' ),
				'description' => esc_attr__( 'Set your header text color.', 'blessing' ),
				'section'  => 'header_styling_section',
				'default'     => '#333333',
				'priority'    => 11,
				'choices'     => array(
					'alpha' => true,
				),
				'output' => array(
					array(
						'element'  => 'header.cbp-af-header.cbp-af-header-shrink #mainmenu > li > a, header.cbp-af-header.cbp-af-header-shrink .social a',
						'property' => 'color',
					),
				),
			),
			'header_active_hover_text_color'    => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Header Active and Hover Menu Item Color', 'blessing' ),
				'description' => esc_attr__( 'Set your header active and hover text color.', 'blessing' ),
				'section'     => 'header_styling_section',
				'default'     => '#8ec92f',
				'priority'    => 12,
				'choices'     => array(
					'alpha' => true,
				),
			),
			'header_bg'         => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Header Static Background Color', 'blessing' ),
				'description' => esc_attr__( 'Set your header background color.', 'blessing' ),
				'section'  => 'header_styling_section',
				'default'     => 'rgba(255,255,255,0)',
				'priority'    => 13,
				'choices'     => array(
					'alpha' => true,
				),
				'output' => array(
					array(
						'element'  => '.menu-back.cbp-af-header',
						'property' => 'background-color',
					),
				),
			),
			'header_scroll_bg' => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Header Scroll Background Color', 'blessing' ),
				'description' => esc_attr__( 'Set your header background color.', 'blessing' ),
				'section'  => 'header_styling_section',
				'default'     => 'rgba(255, 255, 255, 0.95)',
				'priority'    => 14,
				'choices'     => array(
					'alpha' => true,
				),
				'output' => array(
					array(
						'element'  => 'header.cbp-af-header.cbp-af-header-shrink',
						'property' => 'background-color',
					),
				),
			),
			'header_scroll_border_bottom' => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Header Scroll Border Bottom Color', 'blessing' ),
				'description' => esc_attr__( 'Set your header border bottom color.', 'blessing' ),
				'section'  => 'header_styling_section',
				'default'     => '#eeeeee',
				'priority'    => 15,
				'choices'     => array(
					'alpha' => true,
				),
				'output' => array(
					array(
						'element'  => 'header.cbp-af-header.cbp-af-header-shrink',
						'property' => 'border-bottom-color',
					),
				),
			),

			'dropdown_menu_color'    => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Dropdown Menu Item Color', 'blessing' ),
				'description' => esc_attr__( 'Set your dropdown menu item color.', 'blessing' ),
				'section'     => 'header_styling_section',
				'default'     => '#fff',
				'priority'    => 16,
				'choices'     => array(
					'alpha' => true,
				),
			),
			'dropdown_menu_bgcolor'    => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Dropdown Menu Item Background Color', 'blessing' ),
				'description' => esc_attr__( 'Set your dropdown menu item background color.', 'blessing' ),
				'section'     => 'header_styling_section',
				'default'     => '',
				'priority'    => 16,
				'choices'     => array(
					'alpha' => true,
				),
			),

			'menu_parent_typo' => array(
				'type'        => 'typography',
				'label'       => esc_attr__( 'Menu Parent Font', 'blessing' ),
				'section'     => 'header_styling_section',
				'default'     => array(
					'font-family'    => 'Montserrat',
					'variant'        => '500',
					'font-size'      => '12px',
					'line-height'    => '1.7em',
					'letter-spacing' => '1px',
					'subsets'        => array( 'latin-ext' ),
					'text-transform' => 'uppercase',
					'text-align'     => 'left'
				),
				'priority'    => 19,
				'output'      => array(
					array(
						'element' => 'ul#mainmenu > li > a',
					),
				),
			),
			'menu_dropdown_typo' => array(
				'type'        => 'typography',
				'label'       => esc_attr__( 'Menu Dropdown Font', 'blessing' ),
				'section'     => 'header_styling_section',
				'default'     => array(
					'font-family'    => 'Montserrat',
					'variant'        => '500',
					'font-size'      => '14px',
					'line-height'    => '1.7em',
					'letter-spacing' => 'normal',
					'subsets'        => array( 'latin-ext' ),
					'text-transform' => 'none',
					'text-align'     => 'left'
				),
				'priority'    => 20,
				'output'      => array(
					array(
						'element' => 'ul#mainmenu li li a',
					),
				),
			),
			
			/* Blog Options */
			'blog_layout'     => array(
				'type'        => 'radio-image',				
				'label'       => esc_html__( 'Select Blog Layout', 'blessing' ),
				'section'     => 'blog_section',
				'default'     => '2colr',
				'priority'    => 1,
				'choices'     => array(
					'1col'  => get_template_directory_uri() . '/assets/images/theme-options/1c.png',
					'2coll'   => get_template_directory_uri() . '/assets/images/theme-options/2cl.png',
					'2colr' => get_template_directory_uri() . '/assets/images/theme-options/2cr.png',					
				),
			),

			'blog_style' => array(
				'type'        => 'select',
				'label'       => esc_html__( 'Select Blog Style', 'blessing' ),
				'section'     => 'blog_section',
				'default'     => 'blog-grid',
				'priority'    => 2,
				'multiple'    => 1,
				'choices'     => array(
					'blog-grid' => esc_attr__( 'Blog Grid', 'blessing' ),
					'blog-list' => esc_attr__( 'Blog List', 'blessing' ),
				),
			),

			'blog_topbg'         => array(
				'type'     => 'image',
				'label'    => esc_attr__( 'Blog background image on top page', 'blessing' ),
				'description' => esc_attr__( 'Upload your background image here for: blog archive page, blog tags page, blog category page, blog search page', 'blessing' ),
				'section'  => 'blog_section',
				'default'  => trailingslashit( get_template_directory_uri() ) . 'assets/images/bg-subheader.jpg',
				'priority' => 3,
			),
			'post_date'    => array(
				'type'     => 'checkbox',
				'label'    => esc_attr__( 'Show Date Post?', 'blessing' ),
				'description' => esc_attr__( '', 'blessing' ),
				'section'     => 'blog_section',
				'default'     => true,
				'priority'    => 4,				
			),
			'post_author'    => array(
				'type'     => 'checkbox',
				'label'    => esc_attr__( 'Show Author Post?', 'blessing' ),
				'description' => esc_attr__( '', 'blessing' ),
				'section'     => 'blog_section',
				'default'     => true,
				'priority'    => 5,				
			),
			'post_comment'    => array(
				'type'     => 'checkbox',
				'label'    => esc_attr__( 'Show Comment Post?', 'blessing' ),
				'description' => esc_attr__( '', 'blessing' ),
				'section'     => 'blog_section',
				'default'     => true,
				'priority'    => 6,				
			),
			'post_category'    => array(
				'type'     => 'checkbox',
				'label'    => esc_attr__( 'Show Category Post?', 'blessing' ),
				'description' => esc_attr__( '', 'blessing' ),
				'section'     => 'blog_section',
				'default'     => true,
				'priority'    => 7,				
			),
			
			/* Start Footer Options */
			// Footer Social
			'fsocial_switch'     => array(
				'type'        => 'toggle',
				'label'       => esc_attr__( 'Social On/Off?', 'blessing' ),
				'description' => esc_attr__( 'If social network is Off, will be auto to show menu on footer bottom to insteaded.', 'blessing' ),
				'section'     => 'footer_section',
				'default'     => '0',
				'priority'    => 9,
			),
			'footer_socials'     => array(
				'type'     => 'repeater',
				'label'    => esc_html__( 'Socials Network', 'blessing' ),
				'section'  => 'footer_section',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'fsocial_switch',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
				'row_label' => array(
					'type' => 'field',
					'value' => esc_attr__('social', 'blessing' ),
					'field' => 'social_name',
				),
				'default'  => array(),
				'fields'   => array(
					'social_name' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Social network name', 'blessing' ),
						'description' => esc_html__( 'This will be the social network name', 'blessing' ),
						'default'     => '',
					),
					'social_icon' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Icon class name', 'blessing' ),
						'description' => esc_html__( 'This will be the social icon: http://fontawesome.io/icons/', 'blessing' ),
						'default'     => '',
					),
					'social_link' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Link url', 'blessing' ),
						'description' => esc_html__( 'This will be the social link', 'blessing' ),
						'default'     => '',
					),
				),
			),
			'fsocial_target_link'    => array(
				'type'        => 'select',
				'label'       => esc_attr__( 'Social icons *HTML a target Attribute*', 'blessing' ),
				'section'     => 'footer_section',
				'default'     => '_self',
				'priority'    => 11,
				'multiple'    => 1,
				'active_callback' => array(
					array(
					  	'setting'  => 'fsocial_switch',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
				'choices'     => array(
					'_self' => esc_attr__( 'Same frame', 'blessing' ),
					'_blank' => esc_attr__( 'New window', 'blessing' ),					
					'_parent' => esc_attr__( 'Parent frame', 'blessing' ),
				),
			),

			'copyright'       => array(
				'type'        => 'textarea',
				'label'       => esc_html__( 'Footer Copyright Text', 'blessing' ),
				'section'     => 'footer_section',
				'default'     => '© Copyright 2018 - Blessing by OceanThemes',
				'priority'    => 12,				
			),
			'footer_main_textcolor'    => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Footer Main Text Color', 'blessing' ),
				'section'  => 'footer_section',
				'default'  => '#ffffff',
				'priority' => 13,
				'choices'     => array(
					'alpha' => true,
				),
				'output' => array(
					array(
						'element'  => 'footer.site-footer, footer.site-footer h3',
						'property' => 'color',
					),
				),
			),
			'footer_bottom_textcolor'    => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Footer Bottom Text Color', 'blessing' ),
				'section'  => 'footer_section',
				'default'  => '#cccccc',
				'priority' => 14,
				'choices'     => array(
					'alpha' => true,
				),
				'output' => array(
					array(
						'element'  => 'footer.site-footer .sub-footer',
						'property' => 'color',
					),
				),
			),				
			'footer_bgmaincolor'    => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Background Color: Main Footer', 'blessing' ),
				'section'  => 'footer_section',
				'default'  => '#111111',
				'priority' => 15,
				'choices'     => array(
					'alpha' => true,
				),
				'output' => array(
					array(
						'element'  => 'footer.site-footer',
						'property' => 'background-color',
					),
				),
			),	
			'footer_bgbottomcolor'    => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Background Color: Bottom Footer', 'blessing' ),
				'section'  => 'footer_section',
				'default'  => '#0b0b0b',
				'priority' => 16,
				'choices'     => array(
					'alpha' => true,
				),
				'output' => array(
					array(
						'element'  => 'footer.site-footer .sub-footer',
						'property' => 'background-color',
					),
				),
			),	
			'footer_main_spacing' => array(
				'type'        => 'spacing',				
				'label'       => esc_attr__( 'Spacing Control: Main Footer', 'blessing' ),
				'section'     => 'footer_section',
				'default'     => array(
					'top'    => '80px',
					'bottom' => '10px',
				),
				'priority'    => 17,
				'output' => array(
					array(
						'element'  => 'footer.site-footer .main-footer',
						'property' => 'padding',
						'units'    => 'px',
					),
				),
			),
			'footer_bottom_spacing' => array(
				'type'        => 'spacing',				
				'label'       => esc_attr__( 'Spacing Control: Bottom Footer', 'blessing' ),
				'section'     => 'footer_section',
				'default'     => array(
					'top'    => '40px',
					'bottom' => '40px',
				),
				'priority'    => 18,
				'output' => array(
					array(
						'element'  => 'footer.site-footer .sub-footer',
						'property' => 'padding',
						'units'    => 'px',
					),
				),
			), 

			//Styling Settings	
			'main_color'    => array(
				'type'     => 'color',
				'label'    => esc_attr__( 'Primary Color', 'blessing' ),
				'section'  => 'styling_section',
				'default'  => '#8ec92f',
				'priority' => 10,
			),			

			'body_typo' => array(
				'type'        => 'typography',
				'label'       => esc_attr__( 'Body Font', 'blessing' ),
				'section'     => 'styling_section',
				'default'     => array(
					'font-family'    => 'Open Sans',
					'variant'        => 'regular',
					'font-size'      => '13px',
					'line-height'    => '1.7em',
					'letter-spacing' => '0',
					'subsets'        => array( 'latin-ext' ),
					'color'          => '#888888',
					'text-transform' => 'none',
					'text-align'     => 'left'
				),
				'priority'    => 10,
				'output'      => array(
					array(
						'element' => 'body',
					),
				),
			),

			//miscellaneous
			'blessing_animation'     => array(
				'type'        => 'toggle',
				'label'       => esc_attr__( 'Animation', 'blessing' ),
				'section'     => 'miscellaneous_section',
				'default'     => '1',
				'priority'    => 9,
				'description' => 'When you scroll page down and elements is animation.',
			),
			'mapapikey'     => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Add Your Google Map API Key', 'blessing' ),
				'section'     => 'miscellaneous_section',
				'default'     => 'AIzaSyAvpnlHRidMIU374bKM5-sx8ruc01OvDjI',
				'priority'    => 10,	
				'description' => 'Get an API Key here: https://developers.google.com/maps/documentation/javascript/get-api-key',			
			),
			'404_topbg'         => array(
				'type'     => 'image',
				'label'    => esc_attr__( '404 background image on top page', 'blessing' ),
				'description' => esc_attr__( 'Upload your background image here', 'blessing' ),
				'section'  => 'miscellaneous_section',
				'default'  => trailingslashit( get_template_directory_uri() ) . 'assets/images/bg-subheader.jpg',
				'priority' => 11,
			),
			'default_topbg'         => array(
				'type'     => 'image',
				'label'    => esc_attr__( 'Default background image on top page', 'blessing' ),
				'description' => esc_attr__( 'Upload your background image here, Use default background image for all pages.', 'blessing' ),
				'section'  => 'miscellaneous_section',
				'default'  => trailingslashit( get_template_directory_uri() ) . 'assets/images/bg-subheader.jpg',
				'priority' => 12,
				'output'      => array(
					array(
						'element' => '#subheader',
						'property' => 'background-image',
					),
				),
			),
			'shop_topbg'         => array(
				'type'     => 'image',
				'label'    => esc_attr__( 'Shop background image on top page', 'blessing' ),
				'description' => esc_attr__( 'Upload your background image here', 'blessing' ),
				'section'  => 'miscellaneous_section',
				'default'  => trailingslashit( get_template_directory_uri() ) . 'assets/images/bg-subheader.jpg',
				'priority' => 11,
			),
		),
	)
);

/**
 * Add color styling from theme
 */
function blessing_custom_styles_method() {
	$color = blessing_get_option('main_color'); //E.g. #FF0000
	$menu_hover_color = blessing_get_option('header_active_hover_text_color');
	$preloadbg = blessing_get_option('preload_bgcolor');
	$dropdown_menu_color = blessing_get_option('dropdown_menu_color');
	$dropdown_menu_bgcolor = blessing_get_option('dropdown_menu_bgcolor');
    $custom_css = "
    	::selection {
			color: #fff;
			background:  {$color};
		}
		::-moz-selection {
			color: #fff;
			background:  {$color};
		}

		/* default color: #8ec92f */
		/* Color */
		a{color: {$color};}
		a:hover{color:#222;}
		
		.event-list span.time:before,		
		.countdown li span,
		blockquote:before, .text-title h2,
		.hover .btn-view-details,
		.pagination li a, .woocommerce .star-rating span, .woocommerce .star-rating::before,
		.price .woocommerce-Price-amount, header .info ul.info-list li i
		{color: {$color};}

		#mainmenu > li.current-menu-ancestor > a, #mainmenu > li > a:hover, header .social a:hover,
		#mainmenu > li.current-menu-item > a, header.cbp-af-header.cbp-af-header-shrink #mainmenu > li > a:hover,
		header.cbp-af-header.cbp-af-header-shrink #mainmenu > li.current-menu-item > a 
		{color: {$menu_hover_color};}

		/* Background Color */
		.bg-color, .custom-carousel-2 .item-blog .date,
		.custom-col-3 i:hover, 
		.content-group-1 .date-wrap .date,
		.event-item .right-col,
		.btn-custom, a.btn-icon:hover,
		.lessons-list .media a, .button.btn.btn-line:hover,
		#page-events, #page-blog, #menu-btn,
		#sidebar .wp-tag-cloud li a,
		.date-box, #filters a.selected,
		.f_box, .featured-box-pic .btn-custom,
		.event-list .date .month,
		.testi-slider .flex-control-paging li a.flex-active,
		.info-box:hover, .info-box .price,
		.pagination li.active a, .pagination li.active a:hover, 
		.pagination li span.current, 
		.pagination li span.current:hover,
		.st-btn, .fc-widget-header, #back-to-top, #btn-search,
		.woocommerce #respond input#submit, .woocommerce a.button, 
		.woocommerce button.button, .woocommerce input.button, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
		.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt
		{background-color:  {$color};}

		/* Border Color */
		.title-text:before,
		.title-text:after,
		.custom-col-3:hover,
		.custom-col-3 i:hover,
		.countdown-container h3,
		a.btn-icon:hover, .blog-post article:hover,
		.hover .btn-view-details,
		.custom-carousel-2 .item-blog:hover,
		.pagination li.active a, .pagination li.active a:hover, 
		.pagination li span.current, .pagination li span.current:hover, .button.btn.btn-line:hover
		{border-color:  {$color};}	
		
		body.royal_preloader{background-color: {$preloadbg};}	
		@media only screen and (max-width: 992px) {
			#mainmenu li ul li a:hover{
				color:{$menu_hover_color};
			}		
		}

		@media only screen and (min-width: 993px) {
			#mainmenu li li a{
				background-color: {$dropdown_menu_bgcolor};
				color:{$dropdown_menu_color};
			}
			#mainmenu li li a:hover, #mainmenu li li.current-menu-item > a {				
				color:{$color};
				background:{$dropdown_menu_bgcolor};
			}
		}";

    wp_add_inline_style( 'blessing-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'blessing_custom_styles_method' );

