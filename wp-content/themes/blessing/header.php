<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage blessing
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper">
    <?php if( blessing_get_option('header_layout') == 'header2'){ ?>
        <?php get_template_part('framework/headers/header-2'); ?>
    <?php }else{ ?>
    	<!-- header begin -->
        <header class="<?php blessing_header_class(); ?>">        
            <div class="container">
                <span id="menu-btn"></span>
                <div class="row">
                    <div class="col-md-3">
                        <!-- logo begin -->
                        <div id="logo">
                            <div class="inner">
                                <a href="<?php echo esc_url( home_url('/') ); ?>">
                                    <?php if (blessing_get_option( 'logo' ) != '') { ?>
                                        <img src="<?php echo esc_url( blessing_get_option( 'logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo-1">
                                    <?php } ?>                            
                                    <?php if (blessing_get_option( 'logo_scroll' ) != '') { ?>
                                        <img src="<?php echo esc_url( blessing_get_option( 'logo_scroll' ) ); ?>" alt="" class="logo-2">
                                    <?php } ?> 
                                </a>
                            </div>
                        </div>
                        <!-- logo close -->
                    </div>

                    <div class="col-md-9">
                        <!-- mainmenu begin -->
                        <div id="mainmenu-container">
                            <!-- <?php 
                                if ( is_user_logged_in() ) {
                                    wp_nav_menu('menu+');}
                            ?> -->
                            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb'    => false, 'container' => '', 'menu_id' => 'mainmenu' ) ); ?>
                        </div>
                        <!-- mainmenu close -->

                        <?php if ( blessing_get_option('social_switch') != false ){  ?>
                            <!-- social icons -->
                            <div class="social">
                                <?php $socials = blessing_get_option( 'header_socials', array() ); ?>
                                <?php foreach ( $socials as $social ) { ?>                                  
                                    <a href="<?php echo esc_url($social['social_link']); ?>" target="<?php echo esc_attr( blessing_get_option( 'social_target_link' ) ); ?>" ><i class="fa fa-<?php echo esc_attr($social['social_icon']); ?>"></i></a>                            
                                <?php } ?> 
                            </div>
                            <!-- social icons close -->
                        <?php } ?>
                    </div>
                </div>
            </div>
        </header>
        <!-- header close -->
    <?php } ?>
