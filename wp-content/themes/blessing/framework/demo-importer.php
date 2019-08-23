<?php
/**
 * Hooks for importer
 *
 * @package Blessing
 */


/**
 * Importer the demo content
 *
 * @since  1.0
 *
 */
function blessing_importer() {
    return array(
        array(
            'name'       => 'Main Demo',
            'preview'    => 'http://oceanthemes.net/plugins-required/blessing/import-demo/preview.jpg',
            'content'    => 'http://oceanthemes.net/plugins-required/blessing/import-demo/demo-content.xml',
            'customizer' => 'http://oceanthemes.net/plugins-required/blessing/import-demo/customizer.dat',
            'widgets'    => 'http://oceanthemes.net/plugins-required/blessing/import-demo/widgets.wie', 
			'sliders'    => 'http://oceanthemes.net/plugins-required/blessing/import-demo/sliders.zip',			
            'pages'      => array(
                'front_page' => 'Home',
                'blog'       => 'News', 				
            ),
            'menus'      => array(
                'primary'      => 'main-menu',
                'footer-menu'  => 'footer-menu',
            ),
        ),
        array(
            'name'       => 'Home 2',
            'preview'    => 'http://oceanthemes.net/plugins-required/blessing/import-demo/preview2.jpg',
            'content'    => 'http://oceanthemes.net/plugins-required/blessing/import-demo/demo-content.xml',
            'customizer' => 'http://oceanthemes.net/plugins-required/blessing/import-demo/customizer.dat',
            'widgets'    => 'http://oceanthemes.net/plugins-required/blessing/import-demo/widgets.wie',
			'sliders'    => 'http://oceanthemes.net/plugins-required/blessing/import-demo/sliders.zip',	
            'pages'      => array(
                'front_page' => 'Home 2',
                'blog'       => 'News', 	
            ),
            'menus'      => array(
                'primary'      => 'main-menu',
                'footer-menu'  => 'footer-menu',
            ),
        ),
        array(
            'name'       => 'Home 3',
            'preview'    => 'http://oceanthemes.net/plugins-required/blessing/import-demo/preview3.jpg',
            'content'    => 'http://oceanthemes.net/plugins-required/blessing/import-demo/demo-content.xml',
            'customizer' => 'http://oceanthemes.net/plugins-required/blessing/import-demo/customizer.dat',
            'widgets'    => 'http://oceanthemes.net/plugins-required/blessing/import-demo/widgets.wie',
			'sliders'    => 'http://oceanthemes.net/plugins-required/blessing/import-demo/sliders.zip',	
            'pages'      => array(
                'front_page' => 'Home 3',
                'blog'       => 'News',	
            ),
            'menus'      => array(
                'primary'      => 'main-menu',
                'footer-menu'  => 'footer-menu',
            ),
        ),
    );
}
add_filter( 'soo_demo_packages', 'blessing_importer', 30 );
