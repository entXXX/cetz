<?php
/**
 * Template Name: Template Shop
 */
global $archi_option;
get_header(); ?>

<!-- subheader begin -->
<section id="subheader" data-speed="2" data-type="background" 
    <?php if( function_exists( 'rwmb_meta' ) ) { ?>       
        <?php $images = rwmb_meta( '_cmb_image', "type=image_advanced&size=full" ); ?>
        <?php if($images != ''){ foreach ( $images as $image ) { ?>
        <?php 
        $img =  $image['full_url']; ?>
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
            <div class="col-md-8">
                <div class="blog-list full-width no-hover">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>                           
                            <div class="entry-content">
                                <?php
                                    the_content();

                                    wp_link_pages( array(
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
                <?php get_sidebar('shop'); ?>
            </div>
        </div>

    </div>
</div>
<!-- content close -->

<?php get_footer(); ?>