<?php
/*
 Template Name: Programs - Domestic Safehouses
*/

get_header(); 
//include bootstrap
get_template_part( 'partials/bootstrap' );?>
<style>
	.text-center { text-align: center; }
</style>
<div id="container">
	<div id="content" role="main">
		<div id = "DomesticSafehouses" class="container">
			<div class ="quote text-center">
				</br></br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">"In community we are called to love people just</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">as they are with their wounds and their gifts, not</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">as we want them to be."</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12"><p>- Jean Vanier</p></div>
				</div>
			</div>
			</br>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h1 class="text-center">Domestic Safehouses</h1></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>Because what makes a survivor feel safe varies widely from one culture to the next, safehouses in various countries often look quite different from one another. However, the function and goals are the same. Like their overseas counterparts, safehouses in the U.S. aim to provide a safe and secure environment for survivors to heal while empowering them to begin renewed lives of value, dignity, and purpose.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">Rescue</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>Domestic rescue often involves partnering with local law enforcement to receive at-risk or rescued individuals. Like our international partners, domestic safehouses also establish trust through outreach. Some partners reach out at prisons, porn conventions, and strip clubs, offering hope and escape to wounded men and women in dark places. Others focus on reaching exploited minors, runaways, and children trafficked from their own homes.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">Restoration</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>Though each safehouse has its own personality, all are passionate about walking with the wounded through their healing journeys. In addition to trauma counseling, some safehouses offer substance abuse therapy and drug detoxification. Many take advantage of local resources, offering survivors more options for holistic treatment. Community support groups and recovery programs offer safehouse residents an array of resources to broaden their support networks and encourage them toward futures of promise.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">Empowerment</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>As survivors begin healing, they can also begin rebuilding their lives. Within the nurturing environment of their safehouses, they learn life skills such as cooking, budgeting, hygiene, and nutrition. One may earn a high school diploma while another pursues college coursework. While some safehouses work with job service programs to help survivors find steady employment, others teach vocational skills and offer employment onsite. In these safehouse-run social enterprises, a survivor can learn skills within a safe and supportive community, gaining job experience and new references while working toward emotional and financial stability.</p></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12"><h3 class="text-center" style="margin-bottom:0;">The Role of Women At Risk, International (WAR, Int'l)</h3></div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12"><p>WAR, Int'l is passionate about protecting our own, those at risk in the "land of the free." We take trafficking hotline calls, follow through with law enforcement for rescue and recovery, and help place at-risk and rescued individuals in safe environments. We provide resources and aftercare consultation for our partners and help recruit staff, board members, grant writers, and counselors. We initiate income-generating opportunities such as cafes, retail stores, animal husbandry programs, and more. Fundraising on our partners' behalf, we help purchase land, buildings, furniture, and appliances for their new spaces. We carry products made by safehouses, selling the merchandise in our stores, at home parties, and online. Whether through rescue, recovery, or empowerment, WAR, Int'l walks with our safehouse partners, ensuring that American women, men, and children find true freedom and dignity.</p></div>
			</div>
			
			<!--Stories Partial Template-START-->
			<?php 
			$storyTypeName = 'Domestic Safehouses';
			//Set Story Type
			$storyType = 'Domestic';
			//Call forth magical partial template and pass local vars 
			include(locate_template('partials/stories.php')); ?>
			<!--Stories Partial Template-END-->

			<?php get_template_part( 'partials/take-action' );?> <!--#Call to Action Module-->

			<!--Programs Partial Template-START-->
			<?php 
			$programTypeName = 'Domestic Safehouse';
			//Set Program Type
			$programType = 'Domestic';
			//Call forth magical partial template and pass local vars 
			include(locate_template('partials/programs.php')); ?>
			<!--Programs Partial Template-END-->	
		
		</div>
	</div><!-- #content -->
</div><!-- #container -->
<?php get_footer(); ?>