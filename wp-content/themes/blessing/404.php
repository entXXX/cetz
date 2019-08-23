<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage blessing
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<!-- subheader begin -->
<section id="subheader" data-speed="2" data-type="background" <?php if (blessing_get_option( '404_topbg' ) != '' ){ ?> style="background:url(<?php echo esc_url( blessing_get_option( '404_topbg' ) ); ?>) top;" <?php } ?> >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'blessing' ); ?></h1>
            </div>
        </div>
    </div>
</section>
<!-- subheader close -->

<div class="clearfix"></div>

<!-- content begin -->
<div id="content">
    <div class="container">
        <div class="row">        	
            <div class="col-md-8">
                <div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'blessing' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
            </div> 
            <div class="col-md-4">                    
            	
            </div>           
        </div>
    </div>
</div>
<!-- content close -->

<?php get_footer();
