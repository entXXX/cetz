<!-- header begin -->
<header class="<?php blessing_header_class(); ?> de_header_2" >
    <?php if ( blessing_get_option('topbar_switch') != false ){ ?>
        <!-- top header begin -->
        <div class="info">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="header-contact-info">
                            <?php 
                            if ( blessing_get_option('header_contact_info') != '' ){ 
                                echo blessing_get_option('header_contact_info');
                            } 
                        ?>  
                        </div>
                    </div>    
                    <div class="col-md-3">    
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
        </div>   
        <!-- top header close -->
    <?php } ?>

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
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb'    => false, 'container' => '', 'menu_id' => 'mainmenu' ) ); ?>
                </div>
                <!-- mainmenu close -->
            </div>
        </div>
    </div>

</header>
<!-- header close -->