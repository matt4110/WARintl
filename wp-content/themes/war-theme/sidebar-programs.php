<?php
/*
 Template Name: Program List Redux Sidebar 
*/
?>

<?php
// Determine program type
$q = get_post_meta($post->ID, 'program_type', true);

// Convert Query string into Program_Type
$progType = $q;
if ($q == "international" || $q == "domestic") {
	$progType = $q . " Safehouses";
}
if ($q == "vocational") {
	$progType = $q . " Training";
}
if ($q == "micro") {
	$progType = $q . " Enterprises";
}
if ($q == "health") {
	$progType = "Medical Aid";
}
if ($q == "emergency") {
	$progType = $q . " Intervention";
}
?>
<div id = "ProgramsRedux">
	<ul class = "ProgramCategories2" style="margin-left:44px; margin-top:4px;">
	</br></br>
	<li class = "ProgramCatbTop" style="color:white;"><p><?php echo $progType; ?></p></li>
		<div class = "ProgramList">
			<?php
			global $post;
			global $string1;
			$args = array( 'numberposts' => 50, 'post_type' => 'program', 'orderby'=>'title', 'order'=>'ASC', 'meta_key' => 'program_type', 'meta_value' => $q);
			$myposts = get_posts( $args );
			$postCount = count($myposts);
			$i = 0;
			foreach( $myposts as $post ) : setup_postdata($post); ?>
				<?php 
				$pID = get_the_ID();
				$pTitle = get_the_title(); 
				$pDescription = get_post_meta($pID, 'description', true);
				$className = 'ProgramCatb';
				?>
				
				<?php 
				$idTag = "program" . get_the_ID();
				$i = $i + 1;
				
				// Determine what background image to use based on Category
				if ($q == "international") {
					$className = 'ProgramCatInternational';
					$cat = 1;
				}
				if ($q == "domestic") {
					$className = 'ProgramCatDomestic';
					$cat = 2;
				}
				if ($q == "vocational") {
					$className = 'ProgramCatVocational';
					$cat = 3;
				}
				if ($q == "micro") {
					$className = 'ProgramCatMicro';
					$cat = 4;
				}
				if ($q == "education") {
					$className = 'ProgramCatEducation';
					$cat = 5;
				}
				if ($q == "orphanages") {
					$className = 'ProgramCatOrphanage';
					$cat = 6;
				}
				if ($q == "health") {
					$className = 'ProgramCatHealth';
					$cat = 7;
				}
				if ($q == "emergency") {
					$className = 'ProgramCatEmergency';
					$cat = 8;
				}
				if ($q == "outreach") {
					$className = 'ProgramCatOutreach';
					$cat = 9;
				}
				?>
				<a href ="<?php echo the_permalink(); ?>" onmouseover ='SwapTxtTo(<?php echo $pID; ?>)'><li class = "<?php echo $className ?>" id = "<?php echo $idTag; ?>"><p><?php the_title(); ?></p></li></a>
			<?php 
				// Create hidden div with mouseover swap information.
				echo $pHTML;
			endforeach; 
			wp_reset_postdata(); ?>
		</div>
		<!--Add a BACK button to programs redux-->
		<a href = "http://warinternational.org/programs/"><li  class = "ProgramBack" style=""><p>Back</p></li></a>
	</ul>
</div>
<div id="preload">
   <img src="http://warinternational.org/wp-content/uploads/2014/07/programs-international-middle-selected.png" width="1" height="1" alt="Image 01-Hover" />
   <img src="http://warinternational.org/wp-content/uploads/2014/07/programs-domestic-middle-selected.png" width="1" height="1" alt="Image 02-Hover" />
   <img src="http://warinternational.org/wp-content/uploads/2014/07/programs-vocational-middle-selected.png" width="1" height="1" alt="Image 03-Hover" />
   <img src="http://warinternational.org/wp-content/uploads/2014/07/programs-micro-middle-selected.png" width="1" height="1" alt="Image 04-Hover" />
   <img src="http://warinternational.org/wp-content/uploads/2014/08/programs-education-middle-selected.png" width="1" height="1" alt="Image 05-Hover" />
   <img src="http://warinternational.org/wp-content/uploads/2014/07/programs-orphan-middle-selected.png" width="1" height="1" alt="Image 06-Hover" />
   <img src="http://warinternational.org/wp-content/uploads/2014/08/programs-outreach-middle-selected.png" width="1" height="1" alt="Image 07-Hover" />
   <img src="http://warinternational.org/wp-content/uploads/2014/07/programs-health-middle-selected.png" width="1" height="1" alt="Image 08-Hover" />
   <img src="http://warinternational.org/wp-content/uploads/2014/07/programs-emergency-middle-selected.png" width="1" height="1" alt="Image 09-Hover" />
</div>