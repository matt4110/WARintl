<?php
/**
 * The template for displaying News & Media page
 * Template Name: News Test
 */

get_header(); ?>
		<div id="container2">
			<div id="content" role="main">
				<div class="news_media">

				<?php
				/* Run the loop to output the page.
				 * If you want to overload this in a child theme then include a file
				 * called loop-page.php and that will be used instead.
				 */
				get_template_part( 'loop', 'page' );
				?>
				</div>
			</div><!-- #content -->
		</div><!-- #container -->
<?php get_footer(); ?>