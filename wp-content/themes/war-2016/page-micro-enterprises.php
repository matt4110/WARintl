<?php
/*
 Template Name: Programs - Microenterprise
*/

get_header(); 
//include bootstrap
get_template_part( 'partials/bootstrap' );?>
<style>
	.text-center { text-align: center; }
</style>
<div id="container">
	<div id="content" role="main">
		<div id = "Microenterprise" class="container">
			<div class ="quote text-center">
				</br></br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">"Give a man a fish and you feed him for a day;</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">teach a man to fish and you feed him for a</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">lifetime."</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12"><p>- Moses Maimonides</p></div>
				</div>
			</div>
			</br>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h2 class="text-center">Microenterprise</h2></div>
			</div>
			</br>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>One woman raises goats and sells the milk; another sells rainwater collected in a cistern. Two sisters operate a laundry business; a mother tailors exquisite garments from her home while her children play at her feet. Still others design greeting cards, sew handbags, or craft fine jewelry, working each day in the company of "sisters" or "brothers" who have shared their journey. These are the faces of the people in our micro-enterprise programs--businesses created to enable rescued and at-risk women and men to support themselves with dignity.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">Rescue</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>Perhaps she has been abandoned or widowed. Perhaps she has been abused or seen her sister sold. Perhaps she has to feed her family and has nothing to sell but herself. Perhaps he is disabled and has no family to help him. These are the stories of women and men at risk--those who are vulnerable, desperate, and targeted by traffickers. But once these individuals can support themselves, they are empowered and protected. Those who can provide for themselves and their families are not lured by the opportunity "promised" by strangers. They are not driven to sell themselves--or their children--out of sheer desperation. WAR, Int'l believes that microenterprise is a powerful way to "rescue" those at risk before they fall prey to traffickers. It is also a way to restore the dignity and ensure the continued safety of those who have escaped abuse and exploitation and are rebuilding their lives.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">Restoration & Empowerment</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>For a survivor rescued from slavery or risk, empowerment is essential to the healing process--to erasing lies of worthlessness and infusing hope and promise for the future. Employment brings about that empowerment by allowing these individuals to begin again and forge new lives. Yet the impact of microenterprise stretches far beyond them, creating powerful ripples that reach into their families and communities. Empowered women and men can afford to educate their children and employ others at risk. They can begin to cultivate change in their villages and neighborhoods, breaking cycles of poverty and risk and influencing the lives of generations to come.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">The Role of Women At Risk, International (WAR, Int'l)</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>WAR, Int'l is passionate about empowering the rescued and at-risk to work with dignity. We may do this by offering business coaching, mentoring, and start-up funding to an entrepreneur or small business owner. We have provided individuals and businesses with goats, cisterns, sewing machines, and other creative means of generating sustainable income. WAR, Int'l also partners with social enterprises and cooperatives that teach job skills and employ at-risk women and men. We may help build and outfit facilities or assist in training staff, ensuring that artisans create products that customers will love. We sell their handiwork in our boutiques, online, at events, and through home parties, creating a market for their products so the businesses can sustain themselves. By all these means, WAR, Int'l is committed to walking alongside men and women who desire to support themselves with dignity--offering them a hand up, not a handout.</p></div>
			</div>
			
			<!--Stories Partial Template-START-->
			<?php 
			$storyTypeName = 'Microenterprise';
			//Set Story Type
			$storyType = 'Micro';
			//Call forth magical partial template and pass local vars 
			include(locate_template('partials/stories.php')); ?>
			<!--Stories Partial Template-END-->

			<?php get_template_part( 'partials/take-action' );?> <!--#Call to Action Module-->

			<!--Programs Partial Template-START-->
			<?php 
			$programTypeName = 'Microenterprise';
			//Set Program Type
			$programType = 'Micro';
			//Call forth magical partial template and pass local vars 
			include(locate_template('partials/programs.php')); ?>
			<!--Programs Partial Template-END-->	
		
		</div>
	</div><!-- #content -->
</div><!-- #container -->
<?php get_footer(); ?>