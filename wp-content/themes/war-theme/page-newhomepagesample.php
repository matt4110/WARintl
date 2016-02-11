<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<?php get_sidebar(); ?>
		<div id="container">
			<div id="content" role="main">

			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			get_template_part( 'loop', 'page' );
			?>
			
			
			<div style="">
				<?php
				global $post;
				global $string1;
				$args = array( 'numberposts' => 1, 'post_type' => 'warblog', 'orderby'=>'rand', 'order'=>'ASC');
				$myposts = get_posts( $args );
				foreach( $myposts as $post ) : setup_postdata($post); ?>
					<div class = "test_div" style="border: solid 2px; border-radius:10px; padding: 5px; margin-right: 2px; width:304px; height: 255px; float: left; text-align: justify;">
					<a href="<?php the_permalink(); ?>">
					<?php $img_id = get_post_meta($post->ID, 'picture', true);
						$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
						?> 
						<a style = "font-size: 20px;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</br>
						<?php 
						$txt = get_the_content();
						echo substr($txt,0,350); echo '...'; ?>
						<a style = "" href="<?php the_permalink(); ?>">Read More</a>
						</br></br>
					</div>
				<?php endforeach; ?>
			</div>
			
			<div style="">
				<?php
				global $post;
				global $string1;
				$args = array( 'numberposts' => 1, 'post_type' => 'story', 'orderby'=>'rand', 'order'=>'ASC');
				$myposts = get_posts( $args );
				foreach( $myposts as $post ) : setup_postdata($post); ?>
					<div class = "test_div" style="border: solid 2px; border-radius:10px; padding: 5px; width:304px; height: 255px; float: left; text-align: justify;">
					<a href="<?php the_permalink(); ?>">
					<?php $img_id = get_post_meta($post->ID, 'picture', true);
						$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
						?> 
						<img style="margin-top: 10px; margin-right: 10px; margin-left: 10px; float: left;" src="<?php echo $image_attributes[0]; ?>" width="100" height="100"></a>
						
						<a style = "font-size: 20px;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</br>
						<?php echo substr(get_post_meta($post->ID, 'story_text', true),0,300); echo '...'; ?>
						<a style = "" href="<?php the_permalink(); ?>">Read More</a>
						</br></br>
					</div>
				<?php endforeach; ?>
			</div>
				</br></br>
				<div style="margin-top:15px;">
					<img src="http://warinternational.org/wp-content/uploads/2012/09/ECFA-Seal_small.jpg" width="40" height="40" class="alignleft">
					ECFA is an accreditation agency that provides organizations like Women At Risk, International (WAR, Int'l) with the financial accountability needed to gain supporters' trust! As an ECFA member, WAR, Int'l aligns its practices with high steward standards, ensuring excellence and honesty in all its financial dealings. To view a complete list of stewardship standards, please visit the ECFA website at <a href="http://www.ecfa.org">www.ecfa.org</a>. The ECFA seal displayed on this page indicates that WAR, Int'l meets ECFA standards of financial responsibility and conducts its finances in an honorable way.
				</div>
			</div><!-- #content -->
		</div><!-- #container -->
<?php get_footer(); ?>
