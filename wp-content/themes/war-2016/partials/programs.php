<?php
/*
 Template Name: Programs
*/ ?>
<script type="text/javascript" src="/scripts/toggle.js"></script>
<div id="programsBlock" class="center-block"><!--Programs-->
	<div class = "row">
		<div class = "col-md-12  text-center">
		<?php //if there are related stories display some text before showing them.
			global $post;
			$args2 = array( 'numberposts' => 99, 'post_type' => 'program', 'orderby'=>'title', 'order'=>'ASC', 'meta_key' => 'program_type', 'meta_value' => $programType);
			$myposts2 = get_posts( $args2 );
			if($myposts2 != null) {
				echo '</br>';
				echo '<b>Specific ' . $programTypeName . ' Programs:'; 
				echo '</b>';
				echo '</br></br>';
			}
		?>
		</div>
	</div>
	<?php
		echo '<div class = "programs-container">';
		echo '<div class = "col-md-3"></div><div class = "row">';
		$i = 0;
		foreach( $myposts2 as $post ) : setup_postdata($post); ?>
		
		<div class="grid-1-3" style = "text-align: center;">
			<a href="<?php the_permalink(); ?>">
				<?php $img_id = get_post_meta($post->ID, 'picture', true);
				$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
				?> 
				<img style="margin-right: 30px; margin-left: 30px; margin-top: 20px; margin-bottom: 10px;" src="<?php echo $image_attributes[0]; ?>" width="150" height="150"></a>
				</br>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</div>
		<?php 
		
		$i++;
		
		// Create a new row every 3 programs
		if (($i % 3) == 0) {
			echo '</div><div class="col-md-3"></div>';
			echo '</div>';
			//If there are more than 6 programs create a hidden div to hold the excess
			if ($i == 6) {
				echo '<div id =  "hidePrograms" style="display:none;">';
			}
			echo '<div class = "programs-container">';
			echo '<div class = "col-md-3"></div><div class = "row">';
		}
		endforeach;
		echo '</div><div class = "col-md-3"></div>';
		echo '</div>';
		//Create endcap for hidden div
		if ($i >= 7) {
			echo '</div>';
			echo '<div class = "text-center" style = "text-align: center; margin-top:20px;">';
			echo '<a href="javascript:toggle(';
			echo "'hidePrograms')";
			echo '">Show/Hide More Programs</a></div>';
		}
			//wp_reset_postdata();
		?>
</div> <!--Programs-->