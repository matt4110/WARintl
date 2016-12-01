<?php
/*
 Template Name: Programs - Education
*/

get_header(); 
//include bootstrap
get_template_part( 'partials/bootstrap' );?>
<style>
	.text-center { text-align: center; }
</style>
<div id="container">
	<div id="content" role="main">
		<div id = "Education" class="container">
			<div class ="quote text-center">
				</br></br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">"Education is a better safeguard of liberty than a</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">standing army."</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12"><p>- Edward Everett, former U.S. Secretary of State</p></div>
				</div>
			</div>
			</br>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h2 class="text-center">Education</h2></div>
			</div>
			</br>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>Whether lighting the fires of academic learning or preventing abuse through knowledge, education can make a powerful difference in the lives of at-risk adults, teens, and children. Some educational programs facilitate schools for children in at-risk communities, while others provide opportunities for vulnerable teens or rescued survivors to finish high school or go to college. Education also takes the form of preventative programs designed to increase awareness about risk, trafficking, and abuse.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">Rescue</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>In poverty-ridden communities, traffickers target vulnerable young women and men without education, luring them with promises of "good work with good pay." Little children may be forced or sold into prostitution by desperate families who see no other means of survival. Education offers these individuals and families the prospect of a better economic future, leaving them far less susceptible to the lures of traffickers. In this way, education can be a formidable means of rescuing a young adult or child from exploitation before it ever occurs.  Women At Risk, International (WAR, Int'l) is just as passionate about rescue through preventative education. In countries where abuse is prevalent and discussion of sexual matters taboo, our partners teach young girls how to avoid unwanted advances. Partners in developing countries go into high-risk schools and neighborhoods to educate children about the risks of the sex industry--scams, abuse, disease, and more. Here in the U.S., WAR, Int'l instructs students, families, churches, and communities about the dangers and signs of trafficking, equipping them to identify and report its presence in their neighborhoods and communities.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">Restoration</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>Making dreams come true in safe places--this is the heart of Women At Risk, International. The wounded and struggling have little chance to hope or dream. But as healing begins to take place, they can begin to realize their God-given potential. An education can be a vital part of this healing process, offering the opportunity not just to dream but to make dreams a reality. Through our partnering schools and education programs, WAR, Int'l has watched at-risk adults and children follow their aspirations and ambitions to become doctors, nurses, lawyers, school teachers, and more.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">Empowerment</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>Educated, empowered individuals create legacies of safety for their families. They can provide for their children, send them to school, and change the trajectory of life for generations to come. Educated men and women often become leaders in their communities, beginning businesses and employing others at risk. Investing in education for at-risk adults, teens, and children can break systemic cycles of exploitation and poverty and kick-start cultural change.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">The Role of Women At Risk, International (WAR, Int'l)</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>When partners need help creating and expanding their schools and educational programs, WAR, Int'l responds. We generate business plans and budgets; we raise funds to build classrooms and dormitories. We may outfit them with benches, school supplies, or wells for clean water. We offer scholarships to the at-risk and rescued for a variety of programs: traditional education, advanced degrees, and vocational training programs. We work with partners to create curriculum and raise funds for prevention and awareness programs. Across the street and around the globe, WAR, Int'l's educational programs are helping to create successful futures and transform lives.</p></div>
			</div>
			
			<!--Stories Partial Template-START-->
			<?php 
			$storyTypeName = 'Education';
			//Set Story Type
			$storyType = 'Education';
			//Call forth magical partial template and pass local vars 
			include(locate_template('partials/stories.php')); ?>
			<!--Stories Partial Template-END-->

			<?php get_template_part( 'partials/take-action' );?> <!--#Call to Action Module-->

			<!--Programs Partial Template-START-->
			<?php 
			$programTypeName = 'Education';
			//Set Program Type
			$programType = 'Education';
			//Call forth magical partial template and pass local vars 
			include(locate_template('partials/programs.php')); ?>
			<!--Programs Partial Template-END-->	
		
		</div>
	</div><!-- #content -->
</div><!-- #container -->
<?php get_footer(); ?>