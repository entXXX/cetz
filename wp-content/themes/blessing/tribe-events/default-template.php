<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header();
?>
<!-- subheader begin -->
<section id="subheader" data-speed="2" data-type="background"
	<?php if( function_exists( 'rwmb_meta' ) ) { ?>       
        <?php $images = rwmb_meta( '_cmb_image', "type=image_advanced&size=full" ); ?>
        <?php if($images){ foreach ( $images as $image ) { ?>
        <?php $img =  $image['full_url']; ?>
          style="background-image: url('<?php echo esc_url($img); ?>');"
        <?php } } ?>
    <?php } ?>
>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
				<?php 
					if ( is_archive() ) {
						the_archive_title( '<h1>', '</h1>' ); 
					}else{
						the_title( '<h1>', '</h1>' ); 
					}
				?> 			   
            </div>
        </div>
    </div>
</section>
<!-- subheader close -->

<div class="clearfix"></div>

<div id="content">
	<div class="container">
        <div class="row">   
            <div id="tribe-events-pg-template" class="tribe-events-pg-template col-md-8">
                <?php tribe_events_before_html(); ?>
                <?php tribe_get_view(); ?>
                <?php tribe_events_after_html(); ?>
            </div> <!-- #tribe-events-pg-template -->
            <div class="col-md-4">   
                <?php get_sidebar(); ?>
            </div>
        </div>
	</div>
</div>

<?php
get_footer();
