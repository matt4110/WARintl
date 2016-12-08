<?php
/**
	Template Name: Sweetie Updates
 * The template for displaying Sweetie Update Page
 */

get_header(); ?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="standard-content">
					<h1 class="entry-title">Sweetie Updates</h1>

					<?php
					/* Run the loop to output the page.
					 * If you want to overload this in a child theme then include a file
					 * called loop-page.php and that will be used instead.
					 */
					//get_template_part( 'loop', 'page' );
					?>
					<?php
					$args = array( 'numberposts' => 999, 'post_type' => 'sweetie', 'order'=>'DESC');
							$myposts = get_posts( $args );
							foreach( $myposts as $post ) : setup_postdata($post); ?>
					<div>
						<a href="<?php the_permalink(); ?>">
						<?php $image =wp_get_attachment_url( get_post_thumbnail_id($post->ID) );  ?> 
						<img class="alignleft" style="width: 17%;" src="<?php echo $image; ?>"></a>
	
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php the_excerpt(); ?>
						</br>
						<hr>
						<br>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
<?php get_footer(); ?>

