<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage blessing
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

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
                <h1><?php the_title(); ?></h1>
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
        	<?php if( blessing_get_option('blog_layout') == '2coll' ){  ?>
                <div class="col-md-4">                    
                    <?php get_sidebar(); ?>
                </div>
            <?php } ?>
        	<div class="<?php if( blessing_get_option('blog_layout') == '1col' ){ echo 'col-md-12'; }else{ echo 'col-md-8'; } ?>">
	    		<?php 
	    			/* Start the Loop */
					while ( have_posts() ) : the_post(); 
				?>
	                <div class="blog-read <?php if ( true != blessing_get_option('post_date') ) { echo 'no-meta-data'; } ?>">
	                	<?php if ( true == blessing_get_option('post_date') ) { ?>
	                    <div class="info">
	                        <div class="date-box">
	                            <div class="day"><?php the_time('d'); ?></div>
            					<div class="month"><?php the_time('M'); ?></div>
	                        </div>
	                    </div>
	                    <?php } ?>
	                    <div class="preview">	    
		                    <?php if ( 'audio' == get_post_format() ) { ?>
		                    	<div class="post-audio">
						            <?php echo rwmb_meta( '_cmb_link_audio', 'type=oembed' ); // if you want get url: $url = get_post_meta( get_the_ID(), '_cmb_link_video', true ); echo $url; ?>        
						        </div> 
		                    <?php }elseif ( 'gallery' == get_post_format() ) { ?>
		                    	<div class="post-slider">
						            <?php if( function_exists( 'rwmb_meta' ) ) { ?>
						              <?php $images = rwmb_meta( '_cmb_images', "type=image" ); ?>
						              <?php if($images){ ?>                  
						                  <?php foreach ( $images as $image ) { ?>
						                    <?php $img = $image['full_url']; ?>
						                    <div class="item"><img src="<?php echo esc_url($img); ?>" alt=""></div> 
						                  <?php } ?>                                     
						              <?php } ?>
						            <?php } ?>
						        </div>		                    
		                    <?php }elseif ( 'video' == get_post_format() ) { ?>
		                    	<div class="post-video">
						            <?php echo rwmb_meta( '_cmb_link_video', 'type=oembed' ); // if you want get url: $url = get_post_meta( get_the_ID(), '_cmb_link_video', true ); echo $url; ?>        
						        </div>
		                    <?php }elseif ( 'image' == get_post_format() ) { ?>
		                    	<div class="post-image">
						            <?php if( function_exists( 'rwmb_meta' ) ) { ?>
						                <?php $images = rwmb_meta( '_cmb_image', "type=image" ); ?>
						                <?php if($images != ''){ ?>              
						                    <?php  foreach ( $images as $image ) {  ?>
						                        <?php $img = $image['full_url']; ?>
						                        <img src="<?php echo esc_url($img); ?>" alt="">
						                    <?php } ?>                
						                <?php }else{ ?>
						                    <?php 
						                        if( has_post_thumbnail() ){               
						                             the_post_thumbnail( 'full' ); 
						                        } 
						                    ?>
						                <?php } ?>
						            <?php } ?>
						        </div>   
		                    <?php }else{ ?>              	
		                    	<div class="post-image">						            
				                    <?php 
				                        if( has_post_thumbnail() ){               
				                             the_post_thumbnail( 'full' ); 
				                        } 
				                    ?>
						        </div> 
		                    <?php } ?>

	                        <?php the_content(); ?>

	                    </div>

	                    <?php if ( true == blessing_get_option('post_date') && true == blessing_get_option('post_author') && true == blessing_get_option('post_category') && true == blessing_get_option('post_comment') ) { ?>
	                    <div class="meta-info">
					    	<?php blessing_entry_meta(); ?>
					    </div>
					    <?php } ?>
	                </div>
	        		<div id="blog-comment" class="<?php if ( true != blessing_get_option('post_date') ) { echo 'no-meta-data'; } ?>">
	            		<?php 
	            			// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							the_post_navigation( array(
								'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'blessing' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'blessing' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper"></span>%title</span>',
								'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'blessing' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'blessing' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper"></span></span>',
							) );
	            		?>
	               	</div>
               	<?php endwhile; // End of the loop. ?>
            </div>               

            <?php if( blessing_get_option('blog_layout') == '2colr' ){  ?>
                <div class="col-md-4">                    
                    <?php get_sidebar(); ?>
                </div>
            <?php } ?>
        </div>

    </div>
</div>
<!-- content close -->

<?php get_footer();
