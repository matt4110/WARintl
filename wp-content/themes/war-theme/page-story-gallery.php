<?php get_header(); ?>
<?php get_sidebar('newsmedia'); ?>
		<div id="container">
			<div id="content" role="main">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-content" style="z-index: 1000;">
					<p>
					Stories are the lifeblood, the heartbeat of WAR. They are the pulse and purpose behind the programs we plan, the speakers you hear, the jewelry you wear. Stories connect us to something greater than a cause. They connect us to real lives, real fears and aches and hopes and striving that is so like our own. If we do not tell these stories, the faces fade out of our minds and we move on. We become disconnected, or maybe even calloused to the ache and suffering around us. Stories have power. When they are shared, hearts soften and change happens.
					</p>
					<p>
					Below is just a sampling of the stories of the women who flow through our programs. Remember them, print them out, post them in a place you will see and pray. They are the heart and soul of WAR, the women and children we rescue and serve.
					</p>
					<!-- #storymenu BEGIN -->
					<div class="story-gallery-redux entry-content">
						<ul class="list-region">
							<?php
							global $post, $curPostID;
							$args = array( 'numberposts' => 6, 'post_type' => 'region', 'orderby'=>'title', 'order'=>'ASC');
							$myposts = get_posts( $args );
							foreach( $myposts as $post ) : setup_postdata($post); ?>
								 <li class = "item-region"><span><?php the_title(); ?></span>
									 <ul class = "list-country">
										<?php
											global $post;
											$args = array( 'numberposts' => 20, 'post_type' => 'country', 'orderby'=>'title', 'order'=>'ASC', 'meta_key' => 'region', 'meta_value' => $post->ID);
											$myposts2 = get_posts( $args );
												foreach( $myposts2 as $post ) : setup_postdata($post); 
													$args2 = array( 'numberposts' => 20, 'post_type' => 'program', 'orderby'=>'title', 'order'=>'ASC', 'meta_key' => 'country', 'meta_value' => $post->ID, 'meta_compare' => 'LIKE');
													$myposts3 = get_posts( $args2 );
													$myCount = count($myposts3); 
													if($myCount > 0) { ?>
													<li class = "item-country"><span><?php the_title(); ?></span>
														<ul class="list-program">
															<?php										
																foreach( $myposts3 as $post ) : setup_postdata($post); 
																	$args3 = array( 'numberposts' => 10, 'post_type' => 'story', 'orderby'=>'title', 'order'=>'ASC', 'meta_key' => 'program', 'meta_value' => $post->ID, 'meta_compare' => 'LIKE');
																	$myposts4 = get_posts( $args3 ); 
																	$myCount2 = count($myposts4);
																	if($myCount2 > 0) {  ?>
																		<li class="item-program"><span><?php the_title() ?></span>
																			<ul class ="list-story">						
																				<?php
																				foreach( $myposts4 as $post ) : setup_postdata($post); ?>
																					<li class "item-story"><a href="<?php the_permalink() ?>"><span><?php the_title() ?></span></a></li>
																				<?php endforeach;
																				?>
																			</ul>
																		</li>
																	<?php } ?>
																<?php endforeach; ?>												
														</ul>
													</li>
													<?php } ?> 
												<?php endforeach; ?>
									 </ul>
								 </li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div><!-- #storymenu END-->
				</br>
		
				<div style="margin-bottom: 200px;">
					<?php
					global $post;
					global $string1;
					$args = array( 'numberposts' => 5, 'post_type' => 'story', 'orderby'=>'rand', 'order'=>'ASC');
					$myposts = get_posts( $args );
					foreach( $myposts as $post ) : setup_postdata($post); ?>
						<div class = "test_div">
						<a href="<?php the_permalink(); ?>">
						<?php $img_id = get_post_meta($post->ID, 'picture', true);
							$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
							?> 
							<img style="margin: 0px 10px 0px 10px; float: left;" src="<?php echo $image_attributes[0]; ?>" width="120" height="120"></a>
							
							<a style = "font-size: 20px;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</br>
							<?php echo substr(get_post_meta($post->ID, 'story_text', true),0,300); echo '...'; ?>
							<a style = "" href="<?php the_permalink(); ?>">Read More</a>
							</br></br></br>
						</div>
					<?php endforeach; ?>
					
					<?php
					//<a href="http://www.warinternational.org/story-gallery">Refresh Stories</a> <--gotta be a better way than refreshing the page
					?>
				</div>
				<?php //echo sharing_display(); ?>
			</div><!-- #content -->
		</div><!-- #container -->
<?php get_footer(); ?>


