<?php
/**
 * Template Name: Blog
 */
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

            <?php if( blessing_get_option('blog_layout') == '2coll' ){  ?>
                <div class="col-md-4">                    
                    <?php get_sidebar(); ?>
                </div>
            <?php } ?>

            <div class="<?php if( blessing_get_option('blog_layout') == '1col' ){ echo 'col-md-12'; }else{ echo 'col-md-8'; } ?>">
                <div class="blog-post <?php if( blessing_get_option('blog_style') == 'blog-list' ){ echo 'blog-list'; }else{ echo 'blog-grid'; } ?>">
                    <?php if(have_posts()) : ?>  
                        <?php 
                            $args = array(    
                              'paged' => $paged,
                              'post_type' => 'post',
                            );
                            $wp_query = new WP_Query($args);
                            while ($wp_query -> have_posts()): $wp_query -> the_post();                         
                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/post/content', get_post_format() );
                        ?> 
                    <?php endwhile;?>         
                    <?php else: ?>
                        <h1><?php _e('Nothing Found Here!', 'blessing'); ?></h1>
                    <?php endif; ?>        
                </div>

                <div class="clearfix"></div>
                <div class="text-center ">
                    <?php blessing_pagination(); ?>
                </div>
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

<?php get_footer(); ?>