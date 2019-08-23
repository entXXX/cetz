<?php
/**
 * Recent_Posts widget class
 *
 * @since 4.4.2
 */
class blessing_widget_recent_posts extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_recent_entries', 'description' => esc_html__( "The most recent posts on your site", 'blessing') );
        parent::__construct('recent-posts', esc_html__('Blessing Recent Posts', 'blessing'), $widget_ops);
        $this->alt_option_name = 'widget_recent_entries';
    }

    function widget($args, $instance) {

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
        if ( ! $number )
            $number = 10;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        if ($r->have_posts()) :
?>
        <?php echo htmlspecialchars_decode( $before_widget ); ?>

        <?php if ( $title ){ echo htmlspecialchars_decode( $before_title ) . esc_attr( $title ) . htmlspecialchars_decode( $after_title ); } ?>

            <ul class="bloglist-small">  
                <?php while ( $r->have_posts() ) : $r->the_post(); ?>   
                    <li>
                        <?php if ( !empty($show_date) ){ ?>
                            <div class="date-box">
                                <span class="day"><?php the_time('d') ?></span>
                                <span class="month"><?php the_time('M') ?></span>
                            </div>
                        <?php } ?>
                        <div class="txt <?php if ( empty($show_date) ){echo 'no-padd';}?>">
                            <h5><a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>">
                            <?php if ( get_the_title() ) the_title(); else the_ID(); ?>   </a></h5>
                            <div>
                                <?php echo blessing_excerpt(8); ?>
                            </div>
                        </div>
                    </li>    
                <?php endwhile; wp_reset_postdata(); ?>    
            </ul>            
		
        <?php echo htmlspecialchars_decode( $after_widget ); ?>
        <?php        
        wp_reset_postdata();

        endif;
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = (bool) $new_instance['show_date'];

        return $instance;
    }

    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
        <p><label for="<?php echo htmlspecialchars_decode( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'blessing' ); ?></label>
        <input class="widefat" id="<?php echo htmlspecialchars_decode( $this->get_field_id( 'title' ) ); ?>" name="<?php echo htmlspecialchars_decode( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

        <p><label for="<?php echo htmlspecialchars_decode( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'blessing' ); ?></label>
        <input id="<?php echo htmlspecialchars_decode( $this->get_field_id( 'number' ) ); ?>" name="<?php echo htmlspecialchars_decode( $this->get_field_name( 'number' ) ); ?>" type="number" value="<?php echo esc_attr( $number ); ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo htmlspecialchars_decode( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo htmlspecialchars_decode( $this->get_field_name( 'show_date' ) ); ?>" />
        <label for="<?php echo htmlspecialchars_decode( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Display post date?', 'blessing' ); ?></label></p>
<?php
    }
}

function blessing_register_custom_widgets() {
    register_widget( 'blessing_widget_recent_posts' );
}
add_action( 'widgets_init', 'blessing_register_custom_widgets' );	