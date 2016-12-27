<?php
/*
 Template Name: Time-pages
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="standard-content">

			<?php if ( have_posts() ) : ?>

					<header class="ta-header">
						<h1 class="post-title"><?php single_post_title(); ?></h1>
						<img src="http://warinternational.org/wp-content/uploads/2015/01/Time-with-framing.png">
					</header>
					<div style="margin-bottom:10px;" class="clearfix">&nbsp;</div>

				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'notitle' );

				// End the loop.
				endwhile;

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

			</div><!-- .standard-content -->
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
