<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( true == blessing_get_option('post_date') ) { ?>
        <div class="info">
            <div class="date-box">
                <div class="day"><?php the_time('d'); ?></div>
                <div class="month"><?php the_time('M'); ?></div>
            </div>
        </div>
    <?php } ?>
    <div class="preview">
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
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php the_excerpt(); ?>
    </div>
    <div class="meta-info">
        <?php blessing_entry_meta(); ?>
    </div>
</article>