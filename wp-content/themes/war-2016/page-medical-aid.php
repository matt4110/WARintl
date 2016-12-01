<?php
/*
 Template Name: Programs - Medical Aid
*/

get_header(); 
//include bootstrap
get_template_part( 'partials/bootstrap' );?>
<style>
	.text-center { text-align: center; }
</style>
<div id="container">
	<div id="content" role="main">
		<div id = "Medical" class="container">
			<div class ="quote text-center">
				</br></br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">"We can cure physical diseases with medicine, but</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">the only cure for loneliness, despair, and hopelessness</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">is love."</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12"><p>- Mother Teresa</p></div>
				</div>
			</div>
			</br>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h2 class="text-center">Medical Aid</h2></div>
			</div>
			</br>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>Where health and medical issues threaten to devastate and disempower, Women At Risk, International (WAR, Int'l) and its partners seek to make a difference. Our Medical Aid programs address a diverse array of problems, including acid attacks, disease, disability, and lack of clean water. Working within cultural boundaries and operating through partnerships and scholarships, WAR, Int'l reaches into lives and communities across the globe to offer hope and healing to those at risk.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center">Rescue & Restoration</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>An acid attack can disfigure a woman for life. A crippling illness can thwart a man's ability to earn a living. Blindness can keep a child from going to school. Severe injury from abuse or torture can prevent a trafficking victim from returning home. In all of these scenarios, medical intervention can rescue an individual from a painful life of being marginalized, ostracized, and tossed aside. Yet surgeries, physical rehabilitation, and other forms of medical care do not just restore the physical body; they also bring healing to the spirit by acting as a reminder of each person's intrinsic value. Offering free medical care to brothel workers speaks worth into their lives. Caring for victims of abuse or attack affirms their dignity in the face of acts intended to dehumanize them. Providing physical rehabilitation and surgeries for the injured and disabled declares to them that their lives matter. Far more than just an investment in physical well-being, medical intervention proclaims value and restores dignity where disease, disability, abuse, or attack have attempted to strip it away.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">Empowerment</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>As women, men, and children are restored to physical and emotional health, they are opened up to new worlds of opportunity. Once marginalized for their physical afflictions, they gain value in the eyes of their families and peers as they become more fully integrated into the fabric of their communities. Many, no longer hindered and stigmatized by their ailments, are able to attain education or employment for the first time. Those who must continue to live with illness or disability are able to learn life and vocational skills within their capabilities which enable them to work and live with dignity. In all these ways and more, medical aid programs bring new life and empowerment to those once sidelined by disease, disfigurement, and disability.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">The Role of Women At Risk, International (WAR, Int'l)</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>WAR, Int'l works hand in hand with partners seeking to combat health issues within their cultures and provide for the medical needs of those they serve. We provide equipment for health centers, facilitate mobile clinics in brothels and poor neighborhoods, and administer scholarship funds for surgeries, rehabilitation, and other medical care. Another way we provide support is through sales of products handmade by men and women with physical disabilities. WAR, Int'l also seeks to restore health to entire villages and communities affected by contaminated water, building new wells that reduce disease and increase safety by keeping water sources close to homes. Whether funding surgeries, providing medical checkups, or digging wells, WAR, Int'l's medical programs strive to decrease risk, transform culture, and restore health and wholeness.</p></div>
			</div>
			
			<!--Stories Partial Template-START-->
			<?php 
			$storyTypeName = 'Medical Aid';
			//Set Story Type
			$storyType = 'Health';
			//Call forth magical partial template and pass local vars 
			include(locate_template('partials/stories.php')); ?>
			<!--Stories Partial Template-END-->

			<?php get_template_part( 'partials/take-action' );?> <!--#Call to Action Module-->

			<!--Programs Partial Template-START-->
			<?php 
			$programTypeName = 'Medical Aid';
			//Set Program Type
			$programType = 'Health';
			//Call forth magical partial template and pass local vars 
			include(locate_template('partials/programs.php')); ?>
			<!--Programs Partial Template-END-->	
		
		</div>
	</div><!-- #content -->
</div><!-- #container -->
<?php get_footer(); ?>