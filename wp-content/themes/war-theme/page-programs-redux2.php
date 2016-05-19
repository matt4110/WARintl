<?php
/*
 Template Name: Program Redux Page 2
*/

get_header('programs'); ?>
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
				<div id = "ProgramsRedux">
					<ul class = "ProgramCategories2">
						</br></br>
						<li class = "ProgramCatbTop"><p>PROGRAM CATEGORIES</p></li>
						<a href="http://www.warinternational.org/program-list/?International" onmouseleave = "DefaultTxt()" onmouseover ="SwapTxt(1)"><li class = "ProgramCatb InternationalButton">
							<p>INTERNATIONAL SAFEHOUSES</p>
						</li></a>
						<a href="http://www.warinternational.org/program-list/?Domestic" onmouseleave = "DefaultTxt()" onmouseover ="SwapTxt(2)"><li class = "ProgramCatb DomesticButton">
							<p>DOMESTIC SAFEHOUSES</p>
						</li></a>
						<a href="http://www.warinternational.org/program-list/?Vocational" onmouseleave = "DefaultTxt()" onmouseover ="SwapTxt(3)"><li class = "ProgramCatb VocationalButton">
							<p>VOCATIONAL TRAINING</p>
						</li></a>
						<a href="http://www.warinternational.org/program-list/?Micro" onmouseleave = "DefaultTxt()" onmouseover ="SwapTxt(4)"><li class = "ProgramCatb MicroButton">
							<p>MICROENTERPRISE</p>
						</li></a>
						<a href="http://www.warinternational.org/program-list/?Education" onmouseleave = "DefaultTxt()" onmouseover ="SwapTxt(5)"><li class = "ProgramCatb EducationButton">
							<p>EDUCATION</p>
						</li></a>
						<a href="http://www.warinternational.org/program-list/?Orphanages" onmouseleave = "DefaultTxt()" onmouseover ="SwapTxt(6)"><li class = "ProgramCatb OrphanButton">
							<p>ORPHANAGES</p>
						</li></a>
						<a href="http://www.warinternational.org/program-list/?Outreach" onmouseleave = "DefaultTxt()" onmouseover ="SwapTxt(9)"><li class = "ProgramCatb OutreachButton">
							<p>OUTREACH</p>
						</li></a>
						<a href="http://www.warinternational.org/program-list/?Health" onmouseleave = "DefaultTxt()" onmouseover ="SwapTxt(7)"><li class = "ProgramCatb HealthButton">
							<p>MEDICAL AID</p>
						</li></a>
						<a href="http://www.warinternational.org/program-list/?Emergency" onmouseleave = "DefaultTxt()" onmouseover ="SwapTxt(8)"><li class = "ProgramCatb EmergencyButton">
							<p>EMERGENCY INTERVENTION</p>
						</li></a>
					</ul>
						<div id = "ProgramCategoriesInfo">
							<h1>Programs</h1><p>The mission of Women At Risk, International is to create circles of protection around women and children, worldwide. Through preventative, curative, and supportive programs, those at-risk find hope.</p><p>Preventative programs safeguard women and children from exploitation, ensuring futures of dignity and worth. Those who were once trafficked, abused, or abandoned find safety, comfort, and healing within curative communities. These projects and partners thrive through the encouragement of WAR’s supportive networks, making it possible to rescue, restore, and empower.</p><p>Search our nine categories and discover a program that empowers you too. Whether international safehouses, microenterprises, or medical aid, each presents an opportunity to lift wounded women and children to places of dignity. Mothers, mechanics, school teachers, and surgeons all have the ability to take action against that which threatens safety, hope, and freedom.</p>
						</div>
						<div id = "ProgramSharingDisplay"><?php echo sharing_display(); ?></div>
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
			</div><!-- #content -->
		</div><!-- #container -->
<?php get_footer(); ?>