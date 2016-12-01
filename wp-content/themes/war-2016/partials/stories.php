<?php
/*
 Template Name: Stories
*/ ?>
<div><!--Stories-->
	<div class = "row">
		<div class = "col-md-12 text-center">
		</br></br>
		<b>Stories from <?php echo $storyTypeName; ?>:</b>
		</br></br>
		</div>
	</div>
	<?php
	global $post, $post2;
	$mypostsCombo;
	$current;
	$args = array( 'numberposts' => 99, 'post_type' => 'program', 'orderby'=>'title', 'order'=>'ASC', 'meta_key' => 'program_type', 'meta_value' =>$storyType);
	$myposts = get_posts( $args );
	if($myposts != null) {
		echo '<div class = "programs-container">';
		echo '<div class = "col-md-3"></div><div class = "row">';
		$i = 0;
		foreach( $myposts as $post )
		{
			$args2 = array( 'numberposts' => 1, 'post_type' => 'story', 'orderby'=>'title', 'order'=>'ASC', 'meta_key' => 'program', 'meta_value' => $post->ID);
			$myposts2 = get_posts( $args2 );
			$mypostsCombo;
			foreach( $myposts2 as $post2 )
			{ ?>
			<div class = "grid-1-3 text-center" style = "text-align: center;"> 
				<a href="<?php echo get_post_permalink($post2->ID); ?>">
				<?php $img_id = get_post_meta($post2->ID, 'picture', true);
				$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
				?> 
				<img class="" style="margin-right: 30px; margin-left: 30px; margin-bottom: 10px; margin-top: 20px;" src="<?php echo $image_attributes[0]; ?>"></a>
				</br>
				<a href="<?php echo get_post_permalink($post2->ID); ?>"><?php echo get_the_title($post2->ID); ?></a>
			</div> <?php
			}
			$i++;
			if (($i % 3) == 0) {
				echo '</div><div class="col-md-3"></div>';
				echo '</div>';
				//If there are more than 6 programs create a hidden div to hold the excess
				if ($i == 6) {
					echo '<div id =  "hideStories" style="display:none;">';
				}
				echo '<div class = "programs-container">';
				echo '<div class = "col-md-3"></div><div class = "row">';
			}
		}
		echo '</div><div class = "col-md-3"></div>';
		echo '</div>';
		//Create endcap for hidden div
		if ($i >= 7) {
			echo '</div>';
			echo '<div class = "text-center" style = "text-align: center; margin-top:20px;">';
			echo '<a href="javascript:toggle(';
			echo "'hideStories')";
			echo '">Show/Hide More Stories</a></div>';
		}
	}
	?>
</div> <!--#Stories-->