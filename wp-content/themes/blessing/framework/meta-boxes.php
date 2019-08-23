<?php

/**
 * Register meta boxes
 *
 * @since 1.0
 *
 * @param array $meta_boxes
 *
 * @return array
 */
if ( is_admin() ) {
	function blessing_register_meta_boxes( $meta_boxes ) {

		$prefix = '_cmb_';

		$meta_boxes[] = array(
			'id'       => 'format_detail',
			'title'    => __( 'Format Details', 'blessing' ),
			'pages'    => array( 'post' ),
			'context'  => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields'   => array(
				array(
					'name'             => __( 'Image', 'blessing' ),
					'id'               => $prefix . 'image',
					'type'             => 'image_advanced',
					'class'            => 'image',
					'max_file_uploads' => 1,
				),
				array(
					'name'  => __( 'Gallery', 'blessing' ),
					'id'    => $prefix . 'images',
					'type'  => 'image_advanced',
					'class' => 'gallery',
				),			
				array(				
					'name'  => __( 'Audio', 'blessing' ),
					'id'    => $prefix . 'link_audio', // How to display on front end: https://metabox.io/docs/get-meta-value/
					'type'  => 'oembed',
					// Allow to clone? Default is false
					'clone' => false,
					// Input size
					'size'  => 30,
					'class' => 'audio',
					'desc' => 'Example: https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/139083759',
				),
				array(
					'name'  => __( 'Video', 'blessing' ),
					'id'    => $prefix . 'link_video', // How to display on front end: https://metabox.io/docs/get-meta-value/
					'type'  => 'oembed',
					// Allow to clone? Default is false
					'clone' => false,
					// Input size
					'size'  => 30,
					'class' => 'video',
					'desc' => 'Example: <b>http://www.youtube.com/embed/0ecv0bT9DEo</b> or <b>http://player.vimeo.com/video/47355798</b>',
				),					
			),
		);

		$meta_boxes[] = array(
			'id'       => 'sermons_format_detail',
			'title'    => __( 'Sermons Post Settings', 'blessing' ),
			'pages'    => array( 'sermons' ),
			'context'  => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields'   => array(	
				array(
					'name'  => __( 'Sermons Date', 'blessing' ),
					'id'    => $prefix . 'sermons_date', // How to display on front end: https://metabox.io/docs/get-meta-value/
					'type'  => 'datetime',
					// Date picker options. See here http://api.jqueryui.com/datepicker
				    'js_options' => array(
				    	'stepMinute'      => 1,
				        'showTimepicker'  => true,
				        'controlType'     => 'select',
				        'showButtonPanel' => false,
				        'oneLine'         => true,
				        'dateFormat'      => 'yy-mm-dd',
				    ),

				    // Display inline?
				    'inline' => false,

				    // Save value as timestamp?
				    'timestamp' => true,
					// Input size
					'size'  => 30,
					'desc' => 'Enter your custom sermons date, The default if blank field will be used post date, The date format is setup in: Settings > General > Date Format, Time Format',
				),					
				array(				
					'name'  => __( 'Audio Link', 'blessing' ),
					'id'    => $prefix . 'link_audio', // How to display on front end: https://metabox.io/docs/get-meta-value/
					'type'  => 'file_input',
					// Allow to clone? Default is false
					'clone' => false,
					// Input size
					'size'  => 30,
					'desc' => 'Add link out or select from media library.',
				),
				array(
					'name'  => __( 'Video Link', 'blessing' ),
					'id'    => $prefix . 'link_video', // How to display on front end: https://metabox.io/docs/get-meta-value/
					'type'  => 'text',
					// Allow to clone? Default is false
					'clone' => false,
					// Input size
					'size'  => 30,
					'desc' => 'Example: <b>http://www.youtube.com/watch?v=0O2aH4XLbto</b> or <b>https://vimeo.com/45830194</b>',
				),	
				array(
					'name'  => esc_html__( 'Upload file', 'blessing' ),
					'id'    => $prefix . 'link_file',
					'type'  => 'file_input',
					'desc' => 'Add link out or select from media library.',
				),
				array(
					'name'  => __( 'Speakers Name', 'blessing' ),
					'id'    => $prefix . 'speakers_name', // How to display on front end: https://metabox.io/docs/get-meta-value/
					'type'  => 'text',
					// Allow to clone? Default is false
					'clone' => false,
					// Input size
					'size'  => 30,
					'desc' => 'Enter name of the Speakers, If left blank, the author name will be used.',
				),
				array(
					'name'  => __( 'Speakers Link', 'blessing' ),
					'id'    => $prefix . 'speakers_link', // How to display on front end: https://metabox.io/docs/get-meta-value/
					'type'  => 'text',
					// Allow to clone? Default is false
					'clone' => false,
					// Input size
					'size'  => 30,
					'desc' => 'Add link to page of the Speakers.',
				),	
			),
		);

		$meta_boxes[] = array(
			'id'       => 'page_settings',
			'title'    => __( 'Page Settings', 'blessing' ),
			'pages'    => array( 'page', 'post', 'tribe_events', 'sermons', 'product' ),
			'context'  => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields'   => array(							
				array(
					'name'             => __( 'Background Top Image', 'blessing' ),
					'id'               => $prefix . 'image',
					'type'             => 'image_advanced',
					'class'            => 'image',
					'max_file_uploads' => 1,
				),	
			),
		);

		return $meta_boxes;
	}
	add_filter( 'rwmb_meta_boxes', 'blessing_register_meta_boxes' );
}