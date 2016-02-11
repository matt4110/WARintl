<?php
/*
 Template Name: Program List Redux
*/

get_header(); ?>
<?php //get_sidebar(); ?>
		<div id="container">
			<div id="content" role="main">

			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			//get_template_part( 'loop', 'page' );
			?>
			
			<script type = "text/javascript">
			window.onscroll = scroll;
			</script>
				
			
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
											<!----Create the Inner HTML for the Program Information box---->
											<?php
											$pHTML = '<div style = "display:none !important;">';
											$pHTML .= '<div id ="' . get_the_ID() . '" style ="display:none;">';
											$pHTML .='<h1>' . $pTitle . '</h1><p>' . $pDescription . '</p>';
											$pHTML .= '<div style = "float:left; text-align:left; margin-bottom:100px;">';
											?>
												<!--If there is a PDF add the link,text, and graphic-->
												<?php if(get_post_meta($post->ID, 'card_pdf', true) != "") : ?>
													<?php $timbo = wp_get_attachment_url(get_post_meta($post->ID, 'card_pdf', true));?>
													<?php $pHTML .= '<div><a  href="' . $timbo . '" target="_blank"><img style="float:left; border: none; margin-top: 4px" src="http://warinternational.org/wp-content/uploads/2014/02/PDF_Download_pdf.png" width="31" height="31">
														<span style = "float:left; margin-top: 11px; margin-left: 6px;">Printable Story Card</span></a></div></br></br>' ?>
														
												<?php endif; ?> 
												<?php //if there are related stories display some text before showing them.
													$args2 = array( 'numberposts' => 3, 'post_type' => 'story', 'post__not_in' => array($post->ID), 'orderby'=>'rand', 'order'=>'DESC', 'meta_key' => 'program', 'meta_value' => $post->ID);
													$myposts2 = get_posts( $args2 );
													if (count($myposts2) > 0) {
														$pHTML .= "</br>Related Stories: </br></br>";
													}
													foreach( $myposts2 as $post2 ) : setup_postdata($post2); 
														$pHTML .= '<div class = "test_div" style = "float:left; text-align: center;">';
														$pHTML .= '<a href="';
														$pHTML .= get_the_permalink($post2->ID);
														$pHTML .= '">';
														$img_id = get_post_meta($post2->ID, 'picture', true);
														$image_attributes = wp_get_attachment_image_src( $img_id ); // returns an array
														$pHTML .= '<img style="margin-right: 10px; margin-left: 10px;" src="';
														$pHTML .= $image_attributes[0];
														$pHTML .= '" width="100" height="100"></a></br><a href="';
														$pHTML .= get_the_permalink($post2->ID);
														$pHTML .= '">';
														//trim the title so it fits under the image box
														$pShortTitle = get_the_title($post2->ID);
														if (strlen($pShortTitle) > 16) { $pShortTitle = substr($pShortTitle, 0, 16); }
														$pHTML .= $pShortTitle;
														$pHTML .= '</a></div>';
													endforeach; 
												
												$pHTML .= '</div>';
												$pHTML .= '</div>';
												$pHTML .= '</div>';
												?>
										
											<!----END Inner HTML for Program Information box---->
											<?php 
											$idTag = "program" . get_the_ID();
											$i = $i + 1;
											//if ( $i == 1 ) {
												//$className = 'ProgramCatb';
											//} elseif ( $i == $postCount ) {
												//$className = 'ProgramCatbBottom';
											//}
											
											// Determine what background image to use based on Category
											if ($q == "International") {
												$className = 'ProgramCatInternational';
											}
											if ($q == "Domestic") {
												$className = 'ProgramCatDomestic';
											}
											if ($q == "Vocational") {
												$className = 'ProgramCatVocational';
											}
											if ($q == "Micro") {
												$className = 'ProgramCatMicro';
											}
											if ($q == "Education") {
												$className = 'ProgramCatEducation';
											}
											if ($q == "Orphanages") {
												$className = 'ProgramCatOrphanage';
											}
											if ($q == "Health") {
												$className = 'ProgramCatHealth';
											}
											if ($q == "Emergency") {
												$className = 'ProgramCatEmergency';
											}
											if ($q == "Outreach") {
												$className = 'ProgramCatOutreach';
											}
											?>
											<a onmouseover ='SwapTxtTo(<?php echo $pID; ?>)'><li class = "<?php echo $className ?>" id = "<?php echo $idTag; ?>"><p><?php the_title(); ?></p></li></a>
											
										<?php 
											// Create hidden div with mouseover swap information.
											echo $pHTML;
										endforeach; ?>
							</div>
							<!--Add a BACK button to programs redux-->
							<a href = "http://warinternational.org/programs/"><li  class = "ProgramBack" style=""><p>Back</p></li></a>
							
					</ul>
					<div id = "ProgramCategoriesInfo">
						<h1>Programs</h1><p>Mouse over a program to view related information.</p>
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
<?php get_footer(); ?>