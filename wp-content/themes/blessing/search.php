<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage blessing
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<!-- subheader begin -->
<section id="subheader" data-speed="2" data-type="background" <?php if (blessing_get_option( 'blog_topbg' ) != '' ){ ?> style="background:url(<?php echo esc_url( blessing_get_option( 'blog_topbg' ) ); ?>) top;" <?php } ?> >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if ( have_posts() ) : ?>
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'blessing' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php else : ?>
					<h1 class="page-title"><?php _e( 'Nothing Found', 'blessing' ); ?></h1>
				<?php endif; ?>
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
                	<?php
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/post/content', 'excerpt' );

							endwhile; // End of the loop.

						else : ?>

							<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'blessing' ); ?></p>
							
							<?php get_search_form(); ?>

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

<?php get_footer();
