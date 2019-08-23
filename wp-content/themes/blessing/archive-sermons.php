<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blessing
 */
get_header(); ?>

<!-- subheader begin -->
<section id="subheader" data-speed="2" data-type="background">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php the_archive_title(); ?></h1>
            </div>
        </div>
    </div>
</section>
<!-- subheader close -->

<div class="clearfix"></div>

<div id="content">
  <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <?php
              if ( have_posts() ) :

                /* Start the Loop */
                while ( have_posts() ) : the_post(); 
                $video_link = get_post_meta( get_the_ID(), '_cmb_link_video', true ); 
                $audio_link = get_post_meta( get_the_ID(), '_cmb_link_audio', true ); 
                $file_link = get_post_meta( get_the_ID(), '_cmb_link_file', true ); 
                $custom_date = get_post_meta( get_the_ID(), '_cmb_sermons_date', true );
            ?>

              <div class="custom-col-3">
                  <div class="left-col">
                    <?php 
                      // Check if the post has a Post Thumbnail assigned to it.
                      if ( has_post_thumbnail() ) {
                          the_post_thumbnail('medium', array('class' => 'img-responsive'));
                      } 
                    ?>                      
                  </div>
                  <div class="mid-col">
                      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                      
                      <div class="details">
                        <span>
                          <?php esc_html_e('By', 'blessing'); ?> <?php the_author_posts_link(); ?>, 
                          <?php                             
                            if ( !empty( $custom_date ) ) {
                              echo date( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ), $custom_date );
                            }else{
                              the_time( get_option( 'date_format' ) );
                            } 
                          ?>
                        </span>
                      </div>
                  </div>
                  <div class="right-col">
                    <?php if ($video_link != '') { ?><a class="popup-youtube" href="<?php echo esc_url($video_link); ?>"><i class="fa fa-video-camera"></i></a><?php } ?>
                    <?php if ($audio_link != '') { ?>
                      <a id="open-popup-link<?php the_ID(); ?>" class="audio-popup" href="#audio-content-popup<?php the_ID(); ?>"><i class="fa fa-volume-up"></i></a>
                      <!-- Popup itself -->
                      <div id="audio-content-popup<?php the_ID(); ?>" class="blessing-sermon-inline-media mfp-hide">              
                        <audio preload="none" controls style="max-width:100%;">
                          <source src="<?php echo esc_url($audio_link); ?>" type="audio/mp3">                 
                        </audio>
                      </div>
                      <script type="text/javascript">
                        (function($) { "use strict";          
                          $('#open-popup-link<?php the_ID(); ?>').magnificPopup({
                            type:'inline',
                            midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
                          });
                        })(jQuery);
                      </script>
                    <?php } ?>
                    <?php if ($file_link != '') { ?><a href="<?php echo esc_url($file_link); ?>" target="_blank"><i class="fa fa-file-pdf-o"></i></a><?php } ?>
                  </div>
              </div>

            <?php   
                endwhile;             
              else :
                get_template_part( 'template-parts/post/content', 'none' );
              endif;
            ?>
            <div class="clearfix"></div>
            <div class="text-center ">
                <?php blessing_pagination(); ?>
            </div>
          </div>
      </div>
  </div>
</div>

<?php 
get_footer(); 
