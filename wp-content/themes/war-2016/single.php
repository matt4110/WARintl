<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="post-content">
	<main id="main-taco" class="site-main" role="main">
		<div class="standard-content-post">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				// Include the single post content template.
				get_template_part( 'template-parts/content', 'single' );

				// End of the loop.
			endwhile;
			?>

		</div>
		<?php get_template_part( 'partials/take-action' );?> <!--#Call to Action Module-->
		<div class="standard-content">

			<?php
			while ( have_posts() ) : the_post();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

				if ( is_singular( 'attachment' ) ) {
					// Parent post navigation.
					the_post_navigation( array(
						'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
					) );
				} elseif ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					the_post_navigation( array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'post:', 'twentysixteen' ) . '</span> ' .
							'<span class="post-nav-title">%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'post:', 'twentysixteen' ) . '</span> ' .
							'<span class="post-nav-title">%title</span>',
					) );
				}

				// End of the loop.
			endwhile;
			?>
		</div><!-- .standard-content -->

		
	</main><!-- .site-main -->


</div><!-- .content-area -->

<?php get_footer(); ?>
