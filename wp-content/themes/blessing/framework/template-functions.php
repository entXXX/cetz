<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package WordPress
 * @subpackage blessing
 * @since 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Blessing 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function blessing_body_classes( $classes ) {

	// Add a class if there is a custom header.
	if ( blessing_get_option('preload') != false ){
		$classes[] = 'royal_preloader';
	}
	
	return $classes;
}
add_filter( 'body_class', 'blessing_body_classes' );

// Add specific CSS class by filter
function blessing_header_class() {

    $header_classes = array();

    if ( blessing_get_option('sticky_header') != false ){
    	$header_classes[] = 'menu-back cbp-af-header';
    }	

    if( blessing_get_option('header_layout') == 'header2' || blessing_get_option('social_switch') == false){
    	$header_classes[] = 'no-header-social';
    }

    // return the $classes array
    echo implode( ' ', $header_classes );
}


//Code Visual Composer.
// Add new Param in Row
if(function_exists('vc_add_param')){
	vc_add_param(
		'vc_row',
		array(
			"type" => "dropdown",
			"heading" => esc_html__('Setup Full width For Row', 'blessing'),
			"param_name" => "fullwidth",
			"value" => array(   
			                esc_html__('No', 'blessing') => 'no',  
			                esc_html__('Yes', 'blessing') => 'yes',                                                                                
			              ),
			"description" => esc_html__("Select Full width for row : yes or not, Default: No fullwidth", 'blessing'),      
        )
    );    

	// Add new Param in Column	
	vc_add_param('vc_column',array(
		  "type" => "dropdown",
		  "heading" => esc_html__('Animate Column', 'blessing'),
		  "param_name" => "animate",
		  "value" => array(   
							esc_html__('None', 'blessing') => 'none', 
							esc_html__('Fade In Up', 'blessing') => 'fadeinup',
							esc_html__('Fade In Down', 'blessing') => 'fadeindown', 
							esc_html__('Fade In', 'blessing') => 'fadein', 
							esc_html__('Fade In Left', 'blessing') => 'fadeinleft',  
							esc_html__('Fade In Right', 'blessing') => 'fadeinright',
						  ),
		  "description" => esc_html__("Select Animate , Default: None", 'blessing'),      
		) 
    );
	vc_add_param('vc_column',array(
		  "type" => "textfield",
		  "heading" => esc_html__('Animate delay number.', 'blessing'),
		  "param_name" => "delay",
		  "value" => "",
		  "description" => esc_html__("Example : 0.2, 0.6, 1, etc", 'blessing'), 
		  "dependency"  => array( 'element' => 'animate', 'value' => array( 'fadeinup', 'fadeindown', 'fadein', 'fadeinleft', 'fadeinright' ) ),     
		) 
    );
    vc_add_param('vc_column',array(
		  "type" => "textfield",
		  "heading" => esc_html__('Animate duration number.', 'blessing'),
		  "param_name" => "duration",
		  "value" => "",
		  "description" => esc_html__("Example : 0.2, 0.6, 1, etc", 'blessing'),   
		  "dependency"  => array( 'element' => 'animate', 'value' => array( 'fadeinup', 'fadeindown', 'fadein', 'fadeinleft', 'fadeinright' ) ),   
		) 
    );  
}

if(function_exists('vc_remove_param')){
	vc_remove_param( "vc_row", "full_width" );
    vc_remove_param( "vc_row", "content_placement" ); 
    vc_remove_param( "vc_row", "equal_height" );
    vc_remove_param( "vc_row", "full_height" );
    vc_remove_param( "vc_row", "columns_placement" );
    vc_remove_param( "vc_row", "parallax" );
    vc_remove_param( "vc_row", "parallax_image" );
    vc_remove_param( "vc_row", "video_bg" );
    vc_remove_param( "vc_row", "video_bg_url" );
    vc_remove_param( "vc_row", "video_bg_parallax" );
    vc_remove_param( "vc_row", "parallax_speed_bg" );
    vc_remove_param( "vc_row", "parallax_speed_video" );
    vc_remove_param( "vc_row", "gap" );
    vc_remove_param( "vc_column", "css_animation" ); 
}	

if(!function_exists('blessing_custom_frontend_scripts')){
    function blessing_custom_frontend_scripts(){
    ?>  
      <?php if ( blessing_get_option('preload') != false ){ ?>
        <script type="text/javascript">
            window.jQuery = window.$ = jQuery;  
            (function($) { "use strict";
            	//Preloader
				Royal_Preloader.config({
					mode           : 'logo',
					logo           : '<?php echo blessing_get_option('preload_logo'); ?>',
					logo_size      : [<?php echo blessing_get_option('preload_logo_width'); ?>, <?php echo blessing_get_option('preload_logo_height'); ?>],
					showProgress   : true,
					showPercentage : true,
			        text_colour: '<?php echo blessing_get_option('preload_text_color'); ?>',
                    background:  '<?php echo blessing_get_option('preload_bgcolor'); ?>'
				});
            })(jQuery);
        </script>
    <?php } ?>          
<?php        
    }
}
add_action('wp_footer', 'blessing_custom_frontend_scripts');