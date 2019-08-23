<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cetcz
 */

get_header();
?>
	<?php if ( is_user_logged_in() ) {?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php } else { ?>

		<div class="spec_header">
			<div class="unlogg">
				<div class="unlog_el"><a href="http://www.cet-prague.cz/knihovna/">Click for view Library</a></div>
				<div class="unlog_el"><a href="https://cz.usembassy.gov/">Click for view Usembassy</a></div>
				<div class="unlog_el"><a href="/wp-admin">Loggin or Registry please, for more information</a></div>
			</div>
		</div>	
	<?php }?>
<?php
get_sidebar();
get_footer();
