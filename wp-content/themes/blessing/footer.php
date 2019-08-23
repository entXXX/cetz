<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage blessing
 * @since 1.0
 * @version 1.2
 */

?>
	
	<!-- footer begin -->
    <footer class="site-footer">
	    <?php if ( is_active_sidebar( 'footer-area-1' ) || is_active_sidebar( 'footer-area-2' ) || is_active_sidebar( 'footer-area-3' ) || is_active_sidebar( 'footer-area-4' ) ){ ?>
		    <div class="main-footer">
		    	<div class="container">
			    	<div class="row">
			    		<?php get_sidebar('footer');?>
			    	</div>
			    </div>
		    </div>
	    <?php } ?>
	    
    	<div class="sub-footer">
    		<div class="container">
	            <div class="row">
	                <div class="col-md-6">
		                <div class="copyright">
		                	<?php echo wp_kses( blessing_get_option('copyright'), wp_kses_allowed_html('post') ); ?>
		                </div>
	                </div>
	                <div class="col-md-6">
	                	<?php if ( true ==  blessing_get_option('fsocial_switch') ){  ?>
	                        <!-- social icons -->
	                        <div class="social">
	                            <?php $socials = blessing_get_option( 'footer_socials', array() ); ?>
	                            <?php foreach ( $socials as $social ) { ?>                                  
	                                <a href="<?php echo esc_url($social['social_link']); ?>" target="<?php echo esc_attr( blessing_get_option( 'fsocial_target_link' ) ); ?>" ><i class="fa fa-<?php echo esc_attr($social['social_icon']); ?>"></i></a>                            
	                            <?php } ?> 
	                        </div>
	                        <!-- social icons close -->
	                    <?php }else{ ?>
		                    <nav>
		                        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'fallback_cb'    => false, 'container' => '' ) ); ?>
		                    </nav>
	                    <?php } ?>
	                </div>
	            </div>
	        </div>
    	</div>        
        <a id="back-to-top" href="#" class="show"></a>
    </footer>
    <!-- footer close -->

</div><!-- #wrapper -->

<?php wp_footer(); ?>


</body>
</html>
