<?php
/**
 * The Template for displaying all single Program posts.
 *
 */
get_header();
get_template_part( 'partials/bootstrap' );?>
<style>
	.text-center { text-align: center; }
</style>
	<div id="container">
		<div id="content" role="main" style="color:black;">
			<!-- BEGIN TEMPLATE -->
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 text-center"><h1 style="color:black; margin:0.67em 0;"><?php echo the_title();?></h1></div>
			</div>
			<div class="row">
				<?php
				//Setup data for program layout
				$country = get_post_meta($post->ID, 'country', true);
				$firstCountry = $country[0];
				$flagImgID = get_post_meta($firstCountry, 'flag', true);
				$imageAttributes = wp_get_attachment_image_src( $flagImgID );
				?>
				<div class="col-md-12 col-sm-12 col-xs-12 text-center" style="font-size:2em; margin:0.67em 0;font-weight:bold;"><img src="<?php echo $imageAttributes[0]; ?>" style="margin-right:10px; width: 72px; height:50px;"></img><?php echo get_the_title($firstCountry);?></div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-0 col-xs-0"></div><div class="col-md-6 col-sm-12 col-xs-12"><p><?php echo get_post_meta($post->ID, 'description', true); ?></p></div><div class="col-md-3 col-sm-0 col-xs-0"></div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-0 col-xs-0"></div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div style="margin:0 auto; width: 210px;">
						<?php
						global $post;
						$args = array( 'numberposts' => 99, 'post_type' => 'story', 'order'=>'ASC', 'meta_key' => 'program', 'meta_value' => $post->ID);
						$myposts = get_posts( $args );
						if($myposts != null) {
							echo '</br>';
							echo '<b>Related Stories:</b>';
							echo '</br>';
						}
						foreach( $myposts as $post ) : setup_postdata($post); ?>
							<div class = "test_div" style = "float:left; text-align: center; margin-bottom: 20px;">
								<a href="<?php the_permalink(); ?>">
								<?php $img_id = get_post_meta($post->ID, 'picture', true);
									$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
									?> 
									<img style="margin-right: 30px; margin-left: 30px; margin-bottom: 10px; margin-top: 20px;" src="<?php echo $image_attributes[0]; ?>" width="150" height="150"></a>
									</br>
								<a  href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</div>
						<?php endforeach; ?>	
					</div>
				</div>
				<div class="col-md-4 col-sm-0 col-xs-0"></div>
			</div>
			<?php get_template_part( 'partials/take-action' );?> <!--#Call to Action Module-->
		</div>
		<!--END TEMPLATE -->
		</div><!-- #content -->
	</div><!-- #container -->
<?php get_footer() ?>