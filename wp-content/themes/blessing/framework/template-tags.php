<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage blessing
 * @since 1.0
 */


if ( ! function_exists( 'blessing_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function blessing_entry_meta() {
  if ( true == blessing_get_option('post_author') ) {
  	$byline = sprintf(
  		esc_html_x( 'By: %s', 'post author', 'blessing' ),
  		'<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
  	);
    echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
  }

  if ( true == blessing_get_option('post_category') ) {
    $categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'blessing' ) );
  	if ( $categories_list ) {
  		printf( '<span>|</span><span class="cat-links">%1$s</span>',
  			$categories_list
  		);
  	}
  }

  if ( true == blessing_get_option('post_comment') ) {
    if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
  		echo '<span>|</span><span class="comments-link">';
  			comments_popup_link( esc_html__( '0 comments', 'blessing' ), esc_html__( '1 comment', 'blessing' ), esc_html__( '% comments', 'blessing' ), 'comments-link', esc_html__( 'Comments are off for this post', 'blessing' ) );
  		echo '</span>';
  	}
  }
}
endif;

//pagination
if ( ! function_exists( 'blessing_pagination' ) ) :
function blessing_pagination($prev = 'Prev', $next = 'Next', $pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
		'base' 			=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
		'format' 		=> '',
		'current' 		=> max( 1, get_query_var('paged') ),
		'total' 		=> $pages,
		'prev_text' => $prev,
        'next_text' => $next,		
        'type'			=> 'list',
		'end_size'		=> 3,
		'mid_size'		=> 3
    );
    $return =  paginate_links( $pagination );
	echo str_replace( "<ul class='page-numbers'>", "<ul class='pagination'>", $return );
}
endif;

if ( ! function_exists( 'blessing_custom_wp_admin_style' ) ) :
function blessing_custom_wp_admin_style() {

        wp_register_style( 'blessing_custom_wp_admin_css', get_template_directory_uri() . '/assets/admin/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'blessing_custom_wp_admin_css' );

        wp_enqueue_script( 'blessing-backend-js', get_template_directory_uri()."/assets/admin/admin-script.js", array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'blessing-backend-js' );
}
add_action( 'admin_enqueue_scripts', 'blessing_custom_wp_admin_style' );
endif;

/* Custom comment List: */
function blessing_theme_comment($comment, $args, $depth) {    
   $GLOBALS['comment'] = $comment;
?>
   <li id="comment-<?php comment_ID(); ?>">
   		<div class="avatar"><?php echo get_avatar($comment,$size='60',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536' ); ?></div>
		<div class="comment-info">
			<div class="c_name"><?php printf('%s', get_comment_author()) ?></div>
			<span class="c_date"><?php comment_date('d M Y'); ?> <?php comment_time('H:i:s'); ?></span>
			<span class="c_reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
			<div class="clearfix"></div>
		</div>		
		<div class="comment">
    		<?php if ($comment->comment_approved == '0'){ ?>
    			 <p><em><?php esc_html_e('Your comment is awaiting moderation.','archi') ?></em></p>
    		<?php }else{ ?>
                <?php comment_text() ?>
             <?php } ?>
		</div>			
	</li> 
<?php
}

if ( ! function_exists( 'blessing_excerpt' ) ) :
/** Excerpt Section Blog Post **/
function blessing_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
endif;

if ( ! function_exists( 'blessing_tag_cloud_widget' ) ) :
/**custom function tag widgets**/
function blessing_tag_cloud_widget($args) {
    $args['number'] = 0; //adding a 0 will display all tags
    $args['largest'] = 13; //largest tag
    $args['smallest'] = 13; //smallest tag
    $args['unit'] = 'px'; //tag font unit
    $args['format'] = 'list'; //ul with a class of wp-tag-cloud
    $args['exclude'] = ''; //exclude tags by ID
    return $args;
}
add_filter( 'widget_tag_cloud_args', 'blessing_tag_cloud_widget' );
endif;

/* Custom form search */
function blessing_search_form( $form ) {
    $form = '<form class="search-form" role="search" method="get" action="' . esc_url(home_url( '/' )) . '" >  
      <input type="search" id="search" class="search-field form-control" value="' . get_search_query() . '" name="s" placeholder="'.esc_html__('type to search', 'blessing').'" />
      <button id="btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
      <div class="clearfix"></div>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'blessing_search_form' );