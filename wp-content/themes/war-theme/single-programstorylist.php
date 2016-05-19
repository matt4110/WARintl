<?php
global $post;
global $string1;
$args = array( 'numberposts' => 15, 'post_type' => 'story', 'order'=>'ASC', 'meta_key' => 'program', 'meta_value' => $post->ID);
$myposts = get_posts( $args );
	foreach( $myposts as $post ) : setup_postdata($post); ?>
		<div style = "text-align: justify;">
		<a href="<?php the_permalink(); ?>">
		<?php $img_id = get_post_meta($post->ID, 'picture', true);
			$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
			?> 
			<img style="margin-right: 10px; margin-left: 10px; float: left;" src="<?php echo $image_attributes[0]; ?>" width="100" height="100"></a>
			<a style = "font-size: 20px;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</br>
			<?php echo substr(get_post_meta($post->ID, 'story_text', true),0,250); echo '...'; ?>
			<a style = "" href="<?php the_permalink(); ?>">Read More</a>
			</br></br>
		</div>
	<?php endforeach; ?>
<?php echo sharing_display(); ?>