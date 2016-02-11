<?php
/**
 * The Template for displaying all single Programs.
 *
 */

get_header(); ?>
<?php get_sidebar('programs'); ?>
	<div id="container">
		<div id="content" role="main">
		<!-- BEGIN TEMPLATE -->
		<div id ="ProgramCategoriesInfo"> <!--style="position: static;">-->
			<h1><?php echo the_title();?></h1>
			<p><?php echo get_post_meta($post->ID, 'description', true); ?></p>
			<?php if(get_post_meta($post->ID, 'card_pdf', true) != "") : ?>
				<div>
				<a  href="<?php echo wp_get_attachment_url(get_post_meta($post->ID, 'card_pdf', true));?>" target="_blank"><img style="float:left; border: none; margin-top: 4px" src="http://warinternational.org/wp-content/uploads/2014/02/PDF_Download_pdf.png" width="31" height="31">
				<span style = "float:left; margin-top: 11px; margin-left: 6px;">Printable Story Card</span></a></div>
				</br></br>
			<?php endif; ?> 
			<?php
			global $post;
			$args = array( 'numberposts' => 15, 'post_type' => 'story', 'order'=>'ASC', 'meta_key' => 'program', 'meta_value' => $post->ID);
			$myposts = get_posts( $args );
			if($myposts != null) {
				echo '</br></br>';
				echo '<b>Related Stories:</b>';
				echo '</br></br>';
			}
			foreach( $myposts as $post ) : setup_postdata($post); ?>
				<div class = "test_div" style = "float:left; text-align: center; margin-bottom: 20px;">
					<a href="<?php the_permalink(); ?>">
					<?php $img_id = get_post_meta($post->ID, 'picture', true);
						$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
						?> 
						<img style="margin-right: 10px; margin-left: 10px;" src="<?php echo $image_attributes[0]; ?>" width="100" height="100"></a>
						</br>
					<a  href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</div>
			<?php endforeach; ?>
			
			<?php 
			wp_reset_postdata();
			echo sharing_display(); ?>
		</div>
		<!--END TEMPLATE -->
		</div><!-- #content -->
	</div><!-- #container -->
<!--<script type = "text/javascript">
	window.onscroll = scroll;
</script>-->
<?php get_footer(); ?>