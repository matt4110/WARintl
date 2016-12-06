<?php
/*
 Template Name: Programs - Outreach
*/

get_header(); 
//include bootstrap
get_template_part( 'partials/bootstrap' );?>
<style>
	.text-center { text-align: center; }
</style>
<div id="container">
	<div id="content" role="main">
		<div id = "Outreach" class="container">
			<div class ="quote text-center">
				</br></br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">"You truly let me know I was not just a statistic,</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">I was a human being."</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12"><p>- Trafficking survivor</p></div>
				</div>
			</div>
			</br>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h1 class="text-center">Outreach</h1></div>
			</div>

			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>At the heart of outreach is a desire to speak into the lives of those at risk. Some efforts center on the adult entertainment industry; others strive to reach victims of trafficking or abuse; still others focus on prevention. Though their missions and methods vary, all of Women At Risk, International (WAR, Int'l)'s outreach partners share a passion for the wounded and a desire to see them set free and empowered.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">Rescue</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>Venturing into strip clubs, massage parlors, adult theaters, and even pornography conventions, teams on outreach seek to build relationships with adult entertainment workers right where they are. Visiting time and again, they get to know the people behind the facade--talking with them about their lives, reaching into their hearts, and listening to their fears, hopes, and dreams. For those who dream of a different life, team members dialogue with them about what they need to support themselves and gently talk through options. If someone makes a decision to leave the industry, outreach partners are committed to coming alongside and walking with that survivor through his or her journey.  While some partners focus on the adult entertainment industry, other outreach partners work at making inroads into the dark world of sex trafficking. Visiting hotels, truck stops, and other establishments, they talk with staff, teach them how to look out for trafficking victims, and leave them with resources. They educate mass transit workers and local business owners about signs of trafficking and urge them to take appropriate action. Still other programs seek to rescue through preventative outreach, reaching out to at-risk individuals, families, and neighborhoods through community events and awareness campaigns.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">Restoration & Empowerment</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>A survivor who has left an exploitative situation needs resources as he or she begins to rebuild his or her life. Along with finding safe places for them to begin healing, our partners can direct survivors to counselors and other safe people to help them deal with their trauma. As survivors journey toward wholeness, these new allies help empower them to support themselves with dignity, connecting them with various local resources such as vocational training programs and educational scholarships. Programs focusing on awareness and prevention also go beyond rescue, providing empowerment in the form of tools, resources, and continued involvement in the lives of those touched by their efforts.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">The Role of Women At Risk, International (WAR, Int'l)</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>WAR, Int'l functions as a networking hub and emergency resource for our outreach partners, connecting those in need with others who can help. We may find a safe place for one at-risk individual, locate an employment opportunity for another, and provide emergency clothing for yet another. We help facilitate activities for partners working with at-risk youth and families. While assisting our partners in reaching out to those at risk, we also call others to action on their behalf. WAR, Int'l has funded, spearheaded, and hosted a variety of outreach initiatives, rallying volunteers and mobilizing local communities in widespread anti-trafficking outreach. We create platforms for partners and survivors to share their stories, raising funds and awareness. Whether providing resources, establishing relationships, educating communities, or hosting events, WAR Int'l and its partners are passionate about reaching those at risk both abroad and in "the land of the free."</p></div>
			</div>
			
			<!--Stories Partial Template-START-->
			<?php 
			$storyTypeName = 'Outreach';
			//Set Story Type
			$storyType = 'Outreach';
			//Call forth magical partial template and pass local vars 
			include(locate_template('partials/stories.php')); ?>
			<!--Stories Partial Template-END-->

			<?php get_template_part( 'partials/take-action' );?> <!--#Call to Action Module-->

			<!--Programs Partial Template-START-->
			<?php 
			$programTypeName = 'Outreach';
			//Set Program Type
			$programType = 'Outreach';
			//Call forth magical partial template and pass local vars 
			include(locate_template('partials/programs.php')); ?>
			<!--Programs Partial Template-END-->	
		
		</div>
	</div><!-- #content -->
</div><!-- #container -->
<?php get_footer(); ?>