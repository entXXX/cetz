<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage blessing
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'blessing' ), number_format_i18n( get_comments_number() ) );?>
		</h3>

		<ol class="comment-list">
			<?php wp_list_comments( 'callback=blessing_theme_comment' ); ?>
		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => '<span class="screen-reader-text">' . __( 'Previous', 'blessing' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'blessing' ) . '</span>',
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'blessing' ); ?></p>
	<?php
	endif;

	$aria_req = ( $req ? " aria-required='true'" : '' );
    $comment_args = array(
            'id_form' => 'commentform',                                
            'title_reply'=> '<h3>'.esc_html__('Leave a Comment','blessing').'</h3>',
            'fields' => apply_filters( 'comment_form_default_fields', array(
                'author' => '<div class="row"><div class="col-md-4"><input class="form-control" id="author" name="author" id="name" type="text" value="" placeholder="'. esc_html__( 'Name *', 'blessing' ) .'" /></div>',
                'email' => '<div class="col-md-4"><input class="form-control" id="email" name="email" type="text" value="" placeholder="'. esc_html__( 'Email *', 'blessing' ) .'" /></div>', 
                'url' => '<div class="col-md-4"><input class="form-control" id="url" name="url" type="text" value="" placeholder="'. esc_html__( 'Website', 'blessing' ) .'" /></div></div>',
            ) ),                                
			'comment_field' => '<div class="row"><div class="col-md-12"><textarea class="form-control" name="comment"'.$aria_req.' id="comment" placeholder="'. esc_html__( 'Comment *', 'blessing' ) .'" ></textarea></div></div>',                                                   
			'label_submit' => esc_html__( 'Send', 'blessing' ),
			'class_submit'      => 'btn btn-custom',
			'comment_notes_before' => '',
			'comment_notes_after' => '',               
    );
	comment_form($comment_args);
?>
</div><!-- #comments -->
