<?php
/*
 Template Name: Program List Redux 4
*/

get_header(); ?>
<?php //get_sidebar(); ?>
<div id="container">
	<div id="content" role="main">
	
	<?php
	// Retrieve the url and parse out query string
	$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	$q = parse_url($url, PHP_URL_QUERY);
	
	// Convert Query string into Program_Type
	$progType = $q;
	if ($q == "International" || $q == "Domestic") {
		$progType = $q . " Safehouses";
	}
	if ($q == "Vocational") {
		$progType = $q . " Training";
	}
	if ($q == "Micro") {
		$progType = $q . " Enterprises";
	}
	if ($q == "Health") {
		$progType = "Medical Aid";
	}
	if ($q == "Emergency") {
		$progType = $q . " Intervention";
	}
	?>
		<div id = "ProgramsRedux">
			<ul class = "ProgramCategories2">
				</br></br>
				<li  class = "ProgramCatbTop" style=""><p><?php echo $progType; ?></p></li>
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
									if ($q == "International") {
										$className = 'ProgramCatInternational';
										$cat = 1;
									}
									if ($q == "Domestic") {
										$className = 'ProgramCatDomestic';
										$cat = 2;
									}
									if ($q == "Vocational") {
										$className = 'ProgramCatVocational';
										$cat = 3;
									}
									if ($q == "Micro") {
										$className = 'ProgramCatMicro';
										$cat = 4;
									}
									if ($q == "Education") {
										$className = 'ProgramCatEducation';
										$cat = 5;
									}
									if ($q == "Orphanages") {
										$className = 'ProgramCatOrphanage';
										$cat = 6;
									}
									if ($q == "Health") {
										$className = 'ProgramCatHealth';
										$cat = 7;
									}
									if ($q == "Emergency") {
										$className = 'ProgramCatEmergency';
										$cat = 8;
									}
									if ($q == "Outreach") {
										$className = 'ProgramCatOutreach';
										$cat = 9;
									}
									?>
									<a href ="<?php echo the_permalink(); ?>" onmouseover ='SwapTxtTo(<?php echo $pID; ?>)'><li class = "<?php echo $className ?>" id = "<?php echo $idTag; ?>"><p><?php the_title(); ?></p></li></a>
									
								<?php 
									// Create hidden div with mouseover swap information.
									echo $pHTML;
								endforeach; ?>
					</div>
					<!--Add a BACK button to programs redux-->
					<a href = "http://warinternational.org/programs/"><li  class = "ProgramBack" style=""><p>Back</p></li></a>
					
			</ul>
			<div id = "ProgramCategoriesInfo">
			</div>
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
		<?php //echo sharing_display(); ?>
	</div><!-- #content -->
</div><!-- #container -->
<?php get_footer(); 
echo '<script type = "text/javascript">';
echo	'window.onscroll = scroll;';
echo 'SwapTxt(';
echo $cat;
echo ');';
echo '</script>';
?>