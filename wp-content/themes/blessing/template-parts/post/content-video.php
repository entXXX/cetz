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
        <div class="post-video">
            <?php echo rwmb_meta( '_cmb_link_video', 'type=oembed' ); // if you want get url: $url = get_post_meta( get_the_ID(), '_cmb_link_video', true ); echo $url; ?>        
        </div>                
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php the_excerpt(); ?>
    </div>
    <?php if ( true == blessing_get_option('post_date') && true == blessing_get_option('post_author') && true == blessing_get_option('post_category') && true == blessing_get_option('post_comment') ) { ?>
    <div class="meta-info">
        <?php blessing_entry_meta(); ?>
    </div>
    <?php } ?>
</article>