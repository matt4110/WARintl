<?php
/*
 Template Name: Story Gallery
*/

get_header(); ?>

<?php get_sidebar('newsmedia'); ?>
		<div id="container">
			<div id="content" role="main">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			
			<div style ="z-index: 1000;">
				<ul id ="storymenu">
					
					<?php//insert awesome code here to dynamically build menu from regions, countries, and programs. ?>
					
					<?php
					global $post, $curPostID;
					$args = array( 'numberposts' => 6, 'post_type' => 'region', 'orderby'=>'title', 'order'=>'ASC');
					$myposts = get_posts( $args );
					foreach( $myposts as $post ) : setup_postdata($post); ?>
						 <a href="#"><li><?php the_title(); ?>
							 <ul>
								<?php
									global $post;
									$args = array( 'numberposts' => 20, 'post_type' => 'country', 'orderby'=>'title', 'order'=>'ASC', 'meta_key' => 'region', 'meta_value' => $post->ID);
									$myposts2 = get_posts( $args );
									foreach( $myposts2 as $post ) : setup_postdata($post); ?>
										<a href="#"><li><?php the_title(); ?>
										<?php $curPostID = $post->ID; ?>
											<ul class="lastlist">
												<?php
													//$pj = get_the_title();
													$args = array( 'numberposts' => 20, 'post_type' => 'program', 'orderby'=>'title', 'order'=>'ASC', 'meta_key' => 'country', 'meta_value' => $curPostID, 'meta_compare' => 'LIKE');
													$myposts3 = get_posts( $args );
													foreach( $myposts3 as $post ) : setup_postdata($post); ?>
														
														<?php
														$perma= get_permalink();
														$title=get_the_title();
														$args=array('post_type'=>'story', 'orderby'=>'rand', 'posts_per_page'=>'1', 'meta_key' => 'program', 'meta_value' => $post->ID);
														$story=new WP_Query($args);
														
														while ($story->have_posts()) : $story->the_post();
															$perma = get_permalink();
														endwhile;
														//wp_reset_postdata(); ?>
														
														<a href="<?php echo $perma ?>"><li><?php echo $title ?></li></a>
												<?php endforeach; ?>												
											</ul>
										</li></a>
									<?php endforeach; ?>
							 </ul>
						 </li></a>
						 
					<?php endforeach; ?>
					
					
				</ul>
			</div><!-- #storymenu -->
			</br>
			<div style="margin-bottom: 100px;">
				<?php
				global $post;
				global $string1;
				$args = array( 'numberposts' => 3, 'post_type' => 'story', 'orderby'=>'rand', 'order'=>'ASC');
				$myposts = get_posts( $args );
				foreach( $myposts as $post ) : setup_postdata($post); ?>
					<div class = "test_div">
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
				
				<?php
				//<a href="http://www.warinternational.org/story-gallery">Refresh Stories</a> <--gotta be a better way than refreshing the page
				?>
			</div>
			</div><!-- #content -->
		</div><!-- #container -->



