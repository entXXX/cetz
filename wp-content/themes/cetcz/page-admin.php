<?php 
  /*
    Template Name: Admin
    */
?>
<?php

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
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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
                <div class="blog-list full-width no-hover">
                	<?php while ( have_posts() ) : the_post(); ?>
                		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>							
							<div class="entry-content">
								<?php
                                    the_content();?>
                                    <?php 
                                        // global $wpdb;
                                        // $usernames = $wpdb->get_results("SELECT user_nicename FROM $wpdb->users ORDER BY ID DESC LIMIT 50");
                                        // $seach_nicname = $usernames->user_nicename;
                                     if ( is_user_logged_in() ) {
                                        $current_user = wp_get_current_user();
                                        if ($current_user->user_login == 'siteadmin'){?>
                                            <div class="list_students">
                                                <span style="color: #000000;">
                                                    <h2 class="title_list_students">List Students</h2>
                                                    <?php echo wpb_recently_registered_users(); ?>
                                                    <div class="btn_submit_students"><button type="submit" form="form1" value="Submit">Submit</button></div>
                                                </span>
                                            </div>
                                        <?php } else { 
                                             ?> 
                                            <div class="noadmin"><span> Sorry, you no Administrator and don't have access to this page</span></div>
                                    <?php } } else {?>
                                        <div class="unlogg">
                                            <a href="/wp-admin">Loggin or Registry please</a>	
                                        </div>
                                    <?php } ?>
                                  	<?php wp_link_pages( array(
										'before' => '<div class="page-links">' . __( 'Pages:', 'blessing' ),
										'after'  => '</div>',
									) );
								?>
							</div><!-- .entry-content -->
						</article><!-- #post-## -->
							
						<?php 
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>
					<?php endwhile; // End of the loop. ?>                	                                        
                </div>
            </div>

            <div class="col-md-4">                    
            	<?php get_sidebar(); ?>
            </div>
        </div>

    </div>
</div>
<!-- content close -->

<?php get_footer();
