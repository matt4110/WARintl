<?php
/**
 * The Template for the news front page that displays all news and media posts
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 Template Name: Test
 */

get_header(); ?>
<?php get_sidebar(); ?>
		<div id="container">
			<div id="content" role="main">
			
			<?php
			/* Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			get_template_part( 'loop', 'single' );
			echo do_shortcode('[frontpage_news widget="14228" name="Test"]');
			?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
